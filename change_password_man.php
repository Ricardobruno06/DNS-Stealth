<?php 
session_start();
//require("dbn.php");
include("man_side_bar.php");

	if(isset($_REQUEST["update_info"]) && isset($_REQUEST["old_pass"]) && isset($_REQUEST["new_pass"]) && isset($_REQUEST["con_pass"]))
	{	
		$op=$_REQUEST["old_pass"];
		$np=$_REQUEST["new_pass"];
		$cp=$_REQUEST["con_pass"];
		$mgr_id = $_SESSION['manager_id'];
		$mgr_pass = $_SESSION['manager_pass'];
		
		if($op == $mgr_pass && $np == $cp)
		{
			updateIntoDB("update users set password = '$cp' where user_id = $mgr_id");
			$message = "Password Changed Successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//header("Location: change_password_manager.php");
		}
		else
		{
			$message = "Password Changing Failed";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//header("Location: change_password_manager.php");
		}
		
		
	}
?>


<!DOCTYPE HTML>

<html>
<head>
	<!-- Customized css file 
	<link rel="stylesheet" type="text/css" href="styles/sm_edit_profile.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">-->
</head>
<body>
	<!--<div id="container">
		
		
		<div class="content">
			<form>
				<div class="first_block">
					<h2>Alterar Senha</h2>
					<hr>
				
					<p>Senha Atual</p>
					<input type="password" placeholder="Senha Atual" name="old_pass">
					<p>Nova Senha</p>
					<input type="password" placeholder="Nova Senha" name="new_pass">
					<p>Repita a Nova Senha</p>
					<input type="password" placeholder="Repita a Nova Senha" name="con_pass">
						
					<input type="submit" name="update_info" value="Enviar">
						
				</div>
									
			</form>
		</div>
	</div>-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 Include all compiled plugins (below), or include individual files as needed
	<script src="js/bootstrap.min.js"></script> -->

	<div class="content-wrapper">
	<section class="content">
	<div class="row">

<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Alterar Senha</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form>
                
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label >Senha Atual</label>
                      <input type="password" name="old_pass" class="form-control" placeholder="Atual">
                    </div>
                    <div class="form-group">
                      <label >Nova Senha</label>
                      <input type="password" name="new_pass" class="form-control" placeholder="Nova">
                    </div>
                    <div class="form-group">
                      <label >Repita a Nova Senha</label>
                      <input type="password" name="new_pass" class="form-control" placeholder="Repita">
                    </div>
                    
                  </div><!-- /.box-body -->
                 
                  <div class="box-footer">
                    <button type="submit" name="update_info" class="btn btn-primary">Cadastrar</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
        
        </div>
    </section>
    </div>
</body>
</html>