<?php 
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}
//require("dbn.php");
include("adm_side_bar.php");
$result = getJSONFromDB("select * from customer");
$result = json_decode($result, true);

if(isset($_GET["did"]))
{//deleting a customer
	$id = $_GET["did"];
	deleteFromDB("delete from customer where customer_id = $id");
	//header("Location: view_customers_admin.php");
}

//if (validacao($nome, $email, $senha) == true) {
if(isset($_REQUEST["create_new_customer"]))


{
	if(strlen((string)$_REQUEST["customer_name"])!=0)
	{
		$name = $_REQUEST["customer_name"];
		$contact = "contact";
		$email = $_REQUEST["customer_email"];
		$pass = $_REQUEST["customer_password"];

		$idresult = getJSONFromDB("select max(customer_id) as customer_id from customer");
		$idresult = json_decode($idresult, true);
		$id = $idresult[0]["customer_id"];
		$id = $id + 1;
		//insertIntoDB("insert into customer values($id, '$name', '$contact', '$email')");
		//insertIntoDB("insert into users VALUES($id, 'cos', 'pass', 'active')");
		//header("Location: view_customers_adm.php");	

		if (emailExiste("SELECT * FROM customer WHERE customer_email = '{$email}'") == true) { 
			header("Location: view_customers_admin.php");
		}
		else{

		insertIntoDB("insert into customer values($id, '$name', '$contact', '$email')");
		insertIntoDB("insert into users VALUES($id, 'cos', '$pass', 'active')");
				
		}			
	}
	else{
		header("Location: view_customers_admin.php");
	}
	
}
//}
if(isset($_REQUEST["update_customer"]) )
{
	if(!isset($_REQUEST["customer_id"]) || strlen((String)$_REQUEST["customer_id"])==0)
	{
		header("Location: view_customers_admin.php");
	}
	$id = $_REQUEST["customer_id"];
	$result = getJSONFromDB("select * from customer where customer_id = $id");
	$result = json_decode($result, true);
	if(isset($_REQUEST["customer_name"]) && strlen((String)$_REQUEST["customer_name"])!=0)
	{
		$name = $_REQUEST["customer_name"];
	}
	else{
		$name = $result[0]["customer_name"];
	}
	if(isset($_REQUEST["customer_contact_no"]) && strlen($_REQUEST["customer_contact_no"])!=0)
	{
		$contact = $_REQUEST["customer_contact_no"];
	}
	else{
		$contact = $result[0]["customer_contact_no"];
	}
	if(isset($_REQUEST["customer_email"]) && strlen($_REQUEST["customer_email"])!=0)
	{
		$email = $_REQUEST["customer_email"];
	}
	else{
		$email = $result[0]["customer_email"];
	}
	updateIntoDB("update customer set customer_name = '$name', customer_contact_no = '$contact', 
		customer_email = '$email' where customer_id = $id");
	//header("Location: view_customers_admin.php");

function validacao($nome, $email, $senha)
{
	global $erro;
	$res = true;

	if (empty($nome) == true) {
		$erro["nome"] = "Nome de usuário vazio.";
		$res = false;
	}

	if (empty($email) == true) {
		$erro["email"] = "E-mail vazio.";
		$res = false;
	} else {
		if (emailExiste($email) == true) {
			$erro["email"] = "Este e-mail já existe.";
			$res = false;
		}
	}

	if (strlen($senha) < 6) {
		$erro["senha"] = "Senha deve conter no mínimo 6 caracteres.";
		$res = false;
	}

	return $res;
}

}
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		/*#bd{
			margin-left: 260px;
		}
		.left{
			width: 400px;
			float: left;
		}
		.right{
			width: 400px;
			float: right;
		}

		#tbb{
			border-collapse: collapse;
		}
		#tbb th{
			text-align: left;
			background-color: #3a6070;
			color: #FFF;
			padding: 4px 30px 4px 8px;
		}
		#tbb td{
			border : 1px solid #e3e3e3;
			padding: 4px 8px;
		}
		#myInput{
			width: 300px;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
		}*/
		/*#sb{
			margin-left: 260px;
		}*/
		#tbb th{
			
			background-color: #374850;
			color: #FFF;
			
		}

		table {
    		font-family: arial, sans-serif;
    		border-collapse: collapse;
   			 width: 100%;
   			 background-color: #fff;
		}

		td, th {
    		border: 1px solid #dddddd;
    		text-align: left;
    		padding: 8px;
		}
		/*tr:nth-child(even) {
    background-color: #dddddd;
}*/
		
</style>
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tbb");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
	
	
</head>
<body>
	
	<!--<br><br>
	<div id="sb">
		<input id='myInput' class="w3-input w3-border" 
		align="middle" onkeyup='searchTable()' 
		type='text' placeholder='Procurar'
		style="height:100%" >
	</div>-->
	<!--<div id="bd">-->
		<!--<div class = "left">
			<table id="tbb">
				<h2>Clientes</h2>
				<th>Cliente ID</th> <th>Nome</th> <th>Email</th><th>Apagar</th>
				<?php 
				//	for($i=0;$i<sizeof($result);$i++){
				//		$id = $result[$i]["customer_id"];
				//		$name = $result[$i]["customer_name"];
				//		//$contact = $result[$i]["customer_contact_no"];
				//		$email = $result[$i]["customer_email"];
				//		echo "<tr>
				//			<td>$id</td>
				//			<td>$name</td>
				//			<td>$email</td>
				//			<td><a href='view_customers_admin.php?did=$id'>Apagar</a></td>
				//		 </tr>";
				//	}
				 //?>
			</table>
		</div>-->

		<!--<div class="right">
			<div>
				<form action="view_customers_admin.php" method="POST">
					<table id="tbb">
						<h3>Novo Usuario</h3>

						<tr>
							<td>Nome</td>
							<td><input type="text" name="customer_name"></td>
						</tr>
						<tr>
							<td>Contact No</td>
							<td><input type="text" name="customer_contact_no"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="customer_email"></td>
						</tr>
						<tr>
							<td>Senha</td>
							<td><input type="text" name="customer_password"></td>
						</tr>
					</table>
					<td> <input type="submit" name="create_new_customer" value="Adicionar"></td>
				</form>
			</div>
			<div>
			<br><br>
				<form action="view_customers_admin.php" method="POST">
					<table id="tbb">
						<h3>Atualizar Usuario</h3>
						<tr>
							<td>Id do Usuario</td>
							<td><input type="number" name="customer_id"></td>
						</tr>
						<tr>
							<td>Novo Nome</td>
							<td><input type="text" name="customer_name"></td>
						</tr>
						<tr>
							<td>Novo Email</td>
							<td><input type="text" name="customer_email"></td>
						</tr>
						<tr>
							<td>New Contact No</td>
							<td><input type="text" name="customer_contact_no"></td>
						</tr>

					</table>
					<td> <input type="submit" name="update_customer" value="Atualizar"></td>
				</form>
			</div>
		</div>
	</div>-->

	<div class="content-wrapper">
	<section class="content">
	<div class="row">

	<div class="col-md-6">

		<!--<br><br>
	<div id="sb">
		<input id='myInput' class="w3-input w3-border" 
		align="middle" onkeyup='searchTable()' 
		type='text' placeholder='Procurar'
		style="height:100%" >
	</div>-->
	
		<div class = "left">
			<table id="tbb">
				<h2>Clientes</h2>
				<th>Cliente ID</th> <th>Nome</th> <th>Email</th><th>Apagar</th>
				<?php 
					for($i=0;$i<sizeof($result);$i++){
						$id = $result[$i]["customer_id"];
						$name = $result[$i]["customer_name"];
						//$contact = $result[$i]["customer_contact_no"];
						$email = $result[$i]["customer_email"];
						echo "<tr>
							<td>$id</td>
							<td>$name</td>
							<td>$email</td>
							<td><a href='view_customers_adm.php?did=$id'>Apagar</a></td>
						 </tr>";
					}
				 ?>
			</table>
		</div>

		
	</div>
	<br><br>

<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Novo Cliente</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="view_customers_adm.php" method="POST">
                
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label >Nome</label>
                      <input type="text" name="customer_name" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                      <label >Email</label>
                      <input type="text" name="customer_email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                      <label >Senha</label>
                      <input type="text" name="customer_password" class="form-control" placeholder="Senha">
                    </div>
                    
                  </div><!-- /.box-body -->
                 
                  <div class="box-footer">
                    <button type="submit" name="create_new_customer" class="btn btn-primary">Cadastrar</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
        <div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Atualizar Usuario</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="view_customers_adm.php" method="POST">
                
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label >ID do Usuario</label>
                      <input type="number" name="customer_id" class="form-control" placeholder="ID">
                    </div>
                    <div class="form-group">
                      <label >Nome</label>
                      <input type="text" name="customer_name" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                      <label >E-mail</label>
                      <input type="text" name="customer_email" class="form-control" placeholder="E-mail">
                    </div>
                    
                  </div><!-- /.box-body -->
                 
                  <div class="box-footer">
                    <button type="submit" name="update_customer" class="btn btn-primary">Atualizar</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
        </div>
    </section>
    </div>

</body>
</html>

