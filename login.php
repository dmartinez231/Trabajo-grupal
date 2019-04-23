<?php
include_once("funciones.php");
include_once("datos.php");

$errores= [];
if ($_POST) {
  $errores = validarLogin($_POST);

  if (empty($errores)) {
    loguearUsuario($_POST["mail"]);
    header("location: index.php");
    exit;
  }
}



 ?>
<!DOCTYPE html>
<html>
<?php require_once("head.php"); ?>
<body id="body-home" class="login">
	<?php include_once("menu.php"); ?>
	<div class="container">
  		<div class="center">
		    <form action="login.php" method="POST" class="border p-3 form">
				<h1 class="login">Login</h1>
				<hr>
        <?php if (isset($errores["mail"])): ?>
          <div class="form-group text-center">
  					<a style="color:red ; border: 1px solid red; padding: 10px" href="registro.php">Crear una Cuenta</a>
  				</div>
        <?php else : ?>
				<div class="form-group text-center">
					<a class="create" href="registro.php">Crear una Cuenta</a>
				</div>
      <?php endif; ?>
		      <div class="form-group">
					  <div class="input-group mb-3">
						  <div class="input-group-prepend">
							  <span class="input-group-text"><i class="fa fa-user"></i></span>
						  </div>
						  <input style="color:black; font-weight:500" class="form-control" type="email" name="mail" value="" placeholder="E-mail">
					  </div>
            <?php if (isset($errores["mail"])): ?>
              <span class="small text-danger"><?= $errores["mail"]?> </span>
            <?php endif; ?>
				  </div>
		    	<div class="form-group">
					  <div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-key"></i></span>
						  </div>
						  <input style="color:black; font-weight:500" type="password" name="pass" class="form-control" placeholder="Contraseña">
					  </div>
            <?php if (isset($errores["pass"])): ?>
              <span class="small text-danger"><?= $errores["pass"]?> </span>
            <?php endif; ?>
      		</div>
				<div class="form-row">
		    		<div class="form-group col-md-6">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">Recordar mis datos</label>
			    		</div>
		  			</div>
			    	<div class="form-group col-md-6">
							<a href="#" class="forgot">Recuperar contraseña</a>
					</div>
			    </div>
			    <div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
					</div>
				</div>
				<div class="form-group text-center">
			      	<button type="submit" class="btn btn-primary">Ingresar</button>
				</div>
		    </form>
		</div>
	</div>
  <?php include_once("footer.php"); ?>
  <?php require_once("script.php"); ?>
</body>
</html>
