<?php 
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}

//require("dbn.php");
include("adm_side_bar.php");
$result = getJSONFromDB("select * from manager");
$result = json_decode($result, true);



if(isset($_GET["did"]))
{//deleting a customer
	$id = $_GET["did"];
	deleteFromDB("delete from manager where manager_id = $id");
	deleteFromDB("delete from users where user_id = $id");
	//header("Location: manage_managers_adm.php");
}

if(isset($_REQUEST["create_new_mgr"]))
{
	if(strlen((string)$_REQUEST["mgr_name"])!=0)
	{
		$name = $_REQUEST["mgr_name"];
		//$salary = $_REQUEST["mgr_salary"];
		$salary = 100;
		$email = $_REQUEST["mgr_email"];
		//$contact = $_REQUEST["mgr_contact_no"];
		$contact = "cont";
		$date = date('Y-m-d');

		$idresult = getJSONFromDB("select max(manager_id) as manager_id from manager");
		$idresult = json_decode($idresult, true);
		$id = $idresult[0]["manager_id"];
		$id = $id + 1;

		if (emailExiste("SELECT * FROM manager WHERE manager_email = '{$email}'") == true) { 
			header("Location: manage_managers_adm.php");
		}
		else{

			insertIntoDB("insert into manager values ('$id', '$name', '$date', '$salary', '$email', '$contact')");
			insertIntoDB("insert into users VALUES($id, 'mgr', 'pass', 'active')");
				
		}


		//header("Location: confirma.php");		
	}
	else{
		header("Location: manage_managers_adm.php");
	}
	
}
if(isset($_REQUEST["update_mgr"]) )
{
	if(!isset($_REQUEST["mgr_id"]) || strlen((String)$_REQUEST["mgr_id"])==0)
	{
		header("Location: manage_managers_adm.php");
	}
	$id = $_REQUEST["mgr_id"];
	$result = getJSONFromDB("select * from manager where manager_id = $id");
	$result = json_decode($result, true);
	if(isset($_REQUEST["mgr_salary"]) && strlen((String)$_REQUEST["mgr_salary"])!=0)
	{
		$salary = 100;
	}
	else{
		$salary = 100;
	}
	if(isset($_REQUEST["mgr_contact_no"]) && strlen($_REQUEST["mgr_contact_no"])!=0)
	{
		$contact = $_REQUEST["mgr_contact_no"];
	}
	else{
		$contact = $result[0]["manager_contact_no"];
	}
	if(isset($_REQUEST["mgr_email"]) && strlen($_REQUEST["mgr_email"])!=0)
	{
		$email = $_REQUEST["mgr_email"];
	}
	else{
		$email = $result[0]["manager_email"];
	}
	updateIntoDB("update manager set manager_salary = $salary, manager_contact_no = '$contact', 
		manager_email = '$email' where manager_id = $id");
	header("Location: manage_managers_adm.php");

}


?>


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

<!DOCTYPE html>
<html>
<head>

	<style>
		/*#bd{
			margin-left: 240px;
		}
		.left{
			width: 600px;
			float: left;
		}
		
		.right{
			
			width: 400px;
			float: right;
		}
		#tbb{
			border-collapse: collapse;
			width: 100%;
		}
		#tbb th{
			text-align: left;
			background-color: #374850;
			color: #FFF;
			padding: 4px 30px 4px 8px;
			border-collapse: collapse;
			width: 100%;
		}
		#tbb td{
			border : 1px solid #e3e3e3;
			padding: 4px 8px;
			border-collapse: collapse;
			width: 100%;
		}
		#cd{
			margin-left: 300px;
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
</head>
<body>



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
				<h2>Gerentes</h2>
				<th>Gerente ID</th> <th>Nome</th> <th>Data</th> <th>Email</th><th>Apagar</th>
				<?php 
					for($i=0;$i<sizeof($result);$i++){
						$id = $result[$i]["manager_id"];
						$name = $result[$i]["manager_name"];
						$hiredate = $result[$i]["hire_date"];
						//$sal = $result[$i]["manager_salary"];
						$email = $result[$i]["manager_email"];
						//$phn = $result[$i]["manager_contact_no"];
						echo "<tr>
							<td>$id</td>
							<td>$name</td>
							<td>$hiredate</td>
							<td>$email</td>
							<td><a href='manage_managers_adm.php?did=$id'>Apagar</a></td>
						 </tr>";
					}
					
				 ?>
			</table>
		</div>
		</div>

		<br><br>

		<!--<div class="col-md-6">
		
		<div class="right">
			<div>
			<form action="manage_managers_adm.php" method="POST">
				<table id="tbb">
					<h3>Novo Gerente</h3>

					<tr>
						<td>Nome</td>
						<td><input type="text" name="mgr_name"></td>
					</tr>
					<tr>
						<td>Salario</td>
						<td><input type="number" name="mgr_salary"></td>
					</tr>-->
					<!--<tr>
						<td>Email</td>
						<td><input type="text" name="mgr_email"></td>
					</tr>
					<tr>
						<td>Celular</td>
						<td><input type="text" name="mgr_contact_no"></td>
					</tr>
				</table>
				<td> <input type="submit" name="create_new_mgr" value="Adicionar"></td>
			</form>
		</div>
		<div>
		<br><br>
			<form action="manage_managers_adm.php" method="POST">
				<table id="tbb">
					<h3>Atualizar Gerente</h3>
					<tr>
						<td>ID do Gerente</td>
						<td><input type="number" name="mgr_id"></td>
					</tr>
					<tr>
						<td>New Salary</td>
						<td><input type="number" name="mgr_salary"></td>
					</tr>
					<tr>
						<td>Novo Email</td>
						<td><input type="text" name="mgr_email"></td>
					</tr>
					<tr>
						<td>New Contact No</td>
						<td><input type="text" name="mgr_contact_no"></td>
					</tr>

				</table>
				<input type="submit" name="update_mgr" value="Atualizar">
			</form>
		</div>
		</div>
	
	</div>-->

	
	

<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Novo Gerente</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="manage_managers_adm.php" method="POST">
                
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label >Nome</label>
                      <input type="text" name="mgr_name" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                      <label >Email</label>
                      <input type="text" name="mgr_email" class="form-control" placeholder="E-mail">
                    </div>
                    
                  </div><!-- /.box-body -->
                 
                  <div class="box-footer">
                    <button type="submit" name="create_new_mgr" class="btn btn-primary">Cadastrar</button>
                  </div>
                </form>

              </div><!-- /.box -->
        </div>
        <div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Atualizar Gerente</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="manage_managers_adm.php" method="POST">
                
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label >ID</label>
                      <input type="number" name="mgr_id" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                      <label >Email</label>
                      <input type="text" name="mgr_email" class="form-control" placeholder="E-mail">
                    </div>
                    
                  </div><!-- /.box-body -->
                 
                  <div class="box-footer">
                    <button type="submit" name="update_mgr" class="btn btn-primary">Atualizar</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
        </div>
    </section>
    </div>


</body>
</html>
