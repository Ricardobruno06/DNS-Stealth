<?php

include("adm_side_bar.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	
	<link href="dist/css/confirma.css" rel="stylesheet" type="text/css" />
	<script src="plugins/sweetalert2-7.28.5/package/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script type="text/javascript">
  /**
 * Source: http://t4t5.github.io/sweetalert/
 */

$("button").click(function() {
  $(".sa-success").addClass("hide");
  setTimeout(function() {
    $(".sa-success").removeClass("hide");
  }, 10);
});
</script>

<script type="text/javascript">
  
  function sucesso() {
    swal({
  position: 'center',
  type: 'success',
  title: 'Feito',
  showConfirmButton: false,
  timer: 2500

});
window.setTimeout("location.href='confirma.php';", 1500);
}

</script>



<style type="text/css">
  body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
</style>

</head>
<body>

  <div class="content-wrapper">
  <section class="content">
  <div class="row">
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
                    <button type="submit" name="update_mgr" onsubmit="return validate()"class="btn btn-primary" onclick="sucesso()">Atualizar</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
        </div>
    </section>
    </div>


	<!--<div class="check_mark">
  <div class="sa-icon sa-success animate">
    <span class="sa-line sa-tip animateSuccessTip"></span>
    <span class="sa-line sa-long animateSuccessLong"></span>
    <div class="sa-placeholder"></div>
    <div class="sa-fix"></div>
  </div>
</div>-->

<!--<script type="text/javascript" language="javascript">
  //location.href = 'adm.php';
  window.setTimeout("location.href='adm.php';", 900);
</script>-->

<!--<?php
//sleep(10);
//header('Location: adm.php');
?>-->
<button onclick="sucesso()">Try it2</button>

<!--<script type="text/javascript" language="javascript">
  //location.href = 'adm.php';
  //window.setTimeout("location.href='manage_managers_adm.php';", 1500);
</script>-->
</body>
</html>