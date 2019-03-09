
<!--<?php

// include ua validation
// include ip validation

/*require_once("secure.inc");

  session_start();
  $mensagem = "";
  if(count($_POST)>0) {

	  $dbconn = pg_connect("host=localhost dbname=brnxdns user=brnxdns password=xumbica@")
	      or die('Could not connect: ' . pg_last_error());

	  $result = pg_query($dbconn, "SELECT fn FROM logfile");

	  $row = pg_fetch_array($result);

	  if(is_array($row)) {
	  	$_SESSION["user_id"] = $row[user_id];
	  	$_SESSION["user_name"] = $row[user_name];
	  } else {
		  $mensagem = "Usu&aacute;rio ou senha incorretos!";
	  }

  }
  if(isset($_SESSION["user_id"])) {
  	header("Location:user_dashboard.php");
  }*/
?>-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="imagens/favicon.ico" type="image/x-icon" />

<style>
  div.fundo {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('wbg3.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 0.2;
    filter:alpha(opacity=40);
}

</style>

  </head>
  <body class="login-page">
    <div class="fundo"></div>
    <div class="login-box">
      <div class="login-logo"> 
      <img src="brnx2.png">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Entre com usu&aacute;rio e senha</p>
        <form name="fm" action="login_validation.php" method="POST" onsubmit="return validate1()">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username"  id = "idfield" 
              placeholder="ID de Login" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="pass" 
              placeholder="Senha" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <!--<div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Lembrar credenciais
                </label>
              </div>  -->                      
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
