<?php 
//MUDAR de TRUE para FALSE
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}
//require("dbn.php");
include("adm_side_bar.php");
$mostOrderMadeBy = getJSONFromDB("select customer_contact_no,customer_name from customer WHERE customer_id =
(
SELECT customer_id
    FROM orders
    GROUP BY customer_id
    ORDER BY COUNT(*) DESC
    LIMIT 1)");
$mostOrderMadeBy = json_decode($mostOrderMadeBy, true);
$mostOrderedItem = getJSONFromDB("select item_id,item_name from items WHERE item_id = 
(select item_id
 from orders
 group by item_id
order by count(*) desc
LIMIT 1)");
$mostOrderedItem = json_decode($mostOrderedItem, true);
$totalOrders = getJSONFromDB("select count(order_id) as total_order from orders");
$totalOrders = json_decode($totalOrders, true);
$totalItemsInInventory = getJSONFromDB("select COUNT(item_id) as total_items from items where item_stock > 0");
$totalItemsInInventory = json_decode($totalItemsInInventory, true);

$totalExpenses = getJSONFromDB("
select month, SUM(house_rent + electricity_bill + others) as total_expense from monthly_expense group by month order by month desc");
$totalExpenses = json_decode($totalExpenses, true);
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
			margin-left: 280px;
		}
		.left{
			width: 400px;
			float: left;
		}
		#sb{
			margin-left: 280px;
		}
		.right{
			width: 550px;
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
		#cd{
			margin-left: 300px;
		}
		#myInput{
			width: 300px;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
		}
		#logo{
			padding: 12px 20px;
			margin-left: 280px;
			margin-top: 180px;
		}*/
    
	</style>
	
</head>
<body>
	
	<!--<br><br>
	<div id="sb">
		<input id='myInput' class="w3-input w3-border" 
		align="middle" onkeyup='searchTable()' 
		type='text' placeholder='Procurar'
		style="height:100%" >
	</div>
	<div id="bd">-->
		
		<!--<div class = "left">
			/<h1> Relatório Mensal</h1>
			<table id="tbb">
				<th>Opção</th> <th>Nome/Quantidade</th> 
				<?php 
					/*$most_order_made_by = $mostOrderMadeBy[0]["customer_name"]."(".$mostOrderMadeBy[0]["customer_contact_no"].")";
					$most_ordered_item = $mostOrderedItem[0]["item_name"]."(".$mostOrderedItem[0]["item_id"].")";
					$total_orders = $totalOrders[0]["total_order"];
					$total_item_in_inventory = $totalItemsInInventory[0]["total_items"];
					echo "<tr>
						<td>Most Order Made By</td>
						<td>$most_order_made_by</td>
						</tr>
						<tr>
						<td>Most Ordered Item</td>
						<td>$most_ordered_item</td>
						</tr>
						<tr>
						<td>Total Orders</td>
						<td>$total_orders</td>
						<tr>
						<td>Total Sold Items</td>
						<td>$total_item_in_inventory</td>
					</tr>";*/
				 ?>
			</table>
		</div>-->
		<!--<div class="right">
			<h1> Outras Despesas</h1>
			<table id="tbb">
				<th>Mes</th> <th>Total de Despesas</th> 
				<?php 
					/*for($i=0;$i<sizeof($totalExpenses);$i++){
						$month = $totalExpenses[$i]["month"];
						$te = $totalExpenses[$i]["total_expense"];
						echo "<tr>
						<td>$month</td>
						<td>$te</td>
					    </tr>";
					}*/
				?>
			</table>
		</div>
	</div>-->


	 <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Top Navigation
              <small>Example 2.0</small>&nbsp;<br>
            </h1>

            </section>

          <!-- Main content -->
          <section class="content">

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-signal"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">&Uacute;ltima coleta<br> <b>11/08/2015 - 17:33:52</b></span>
          <span class="info-box-number">Total: 443.093</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-exchange"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Licen&ccedil;as Utilizadas</span>
          <span class="info-box-number">6 de 10</span>
          <div class="progress">
            <div class="progress-bar" style="width: 60%"></div>
          </div>
          <span class="progress-description">
            60% 
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Usu&aacute;rios cadastrados</span>
          <span class="info-box-number"><center><h3><b>18</b></h3></center></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-exclamation-circle"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><center>Alertas</center></span>
          <span class="info-box-number"><br><center>0 alerta(s)</center></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
   <!-- <div class="col-md-3 col-sm-6 col-xs-12">
	
	<img id="logo" src="imagens/brnx.png" alt="Imagem de página não encontrada" width="430" height="200" />
    </div>
  </div> /.row -->

<!--
            <div class="callout callout-info">
              <h4>Tip!</h4>
              <p><b>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular links instead.</b></p>
            </div>


            <div class="callout callout-danger">
              <h4>Warning!</h4>
              <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar and the content will slightly differ than that of the normal layout.</p>
            </div>

-->


<p class="lead">You can change the style of the box by adding any of the contextual classes.</p>
  <div class="row">
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Usu&aacute;rios Conectados</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

<?php
// $myServer = "10.10.10.240\\MSSQLSERVER";
 $myServer = "10.10.10.240\\INFORMACON";
 //$myUser = "php";
 $myUser = "bruno.teste";
 $myPass = "teste123";
// $myPass = "phpsql0605";
 $myDB = "dbManESPSTO";

 //connection to the database
 $dbhandle = mssql_connect($myServer, $myUser, $myPass)
     or die("Couldn't connect to SQL Server on $myServer". " =>".mssql_get_last_message ());

 //select a database to work with
      $selected = mssql_select_db($myDB, $dbhandle)
          or die("Couldn't open database $myDB");

 //declare the SQL statement that will query the database
/*     $query = "SELECT
  DB_NAME(dbid) as DBName,
  COUNT(dbid) as NumberOfConnections,
  hostname,
  loginame as LoginName
FROM
  sys.sysprocesses
WHERE
  dbid > 0 AND
  DB_NAME(dbid) = 'dbManESPSTO' AND
  program_name = 'spm5syntax'
GROUP BY
  dbid, loginame, hostname";
*/

$query = "
SELECT
  DB_NAME(dbid) as DBName,
  hostname,
  loginame as LoginName,
  (CURRENT_TIMESTAMP-MAX(last_batch))AS UltimaAtividade
FROM
  sys.sysprocesses
WHERE
  dbid > 0 AND
  DB_NAME(dbid) = 'dbManESPSTO' AND
  program_name = 'spm5syntax'
GROUP BY
  dbid, loginame, hostname
ORDER BY UltimaAtividade
";

 //execute the SQL query and return records
     $result = mssql_query($query)
         or die('A error occured: ' . mysql_error());

 //Show results in table

	$o = '<table class="table table-striped">

                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Usu&aacute;rio</th>
                      <th>Computador</th>
                      <th>Tempo Ocioso</th>
                      <th>chkbox</th>
                     </tr>';

    $i = 0;
    while ( $record = mssql_fetch_array($result) )
          {
              $o .= '<tr>
			<td>'.++$i.' </td>
			<td>'.$record['LoginName'].'</td> 
		        <td>'.$record['hostname'].'</td>
                        <td>'.$record['UltimaAtividade'].'</td>
                      <td>
	               <div class="form-group">
	                    <label>
	                      <input type="checkbox" class="flat-red" checked/>
	                    </label>
                       </div>               
                     </td>
	
		     </tr>';
          }

     $o .= '</table>';

     echo $o;

?>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-md-5">
      <div class="box box-solid bg-teal-gradient"> 
        <div class="box-header with-border">
          <h3 class="box-title">Uso das Licen&ccedil;as</h3>
        </div><!-- /.box-header --> 
        <div class="box-body chart-responsive">
          <div class="chart" id="line-chart" style="height: 300px;"></div>
        </div><!-- /.box-body -->

      </div><!-- /.box -->

 </div><!-- /.row -->

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
		
			
		


		
        
</body>
</html>

