<?php
include_once("funciones.php");
include_once("datos.php");

// VARIABLES PARA REGISTRO

$errores = [];
$nombreOK = "";
$apellidoOK = "";
$mailOK = "";
$nacimientoOK = "";
$si = "";
$no = "";

if($_POST){
  $errores = validar($_POST);
  if (!isset($errores["nombre"])) {
      $nombreOK = trim($_POST["nombre"]);
  }
  if (!isset($errores["apellido"])) {
      $apellidoOK = trim($_POST["apellido"]);
  }
  if (!isset($errores["mail"])) {
      $mailOK = trim($_POST["mail"]);
  }
  if (!isset($errores["nacimiento"])) {
      $nacimientoOK = trim($_POST["nacimiento"]);
  }
  if (!isset($errores["ofertas"])) {
    if ($_POST["ofertas"] == "si") {
      $si= "checked";
    }
    else {
      $no= "checked";
    }
  }
  if(empty($errores)){
    //GUARDAMOS EL USUARIO
    guardarUsuario(usuario());
    // BORRO LOS DATOS ALMACENADOS EN PERSISTENCIA.
    unset($_POST); unset($nombreOK); unset($apellidoOK); unset($mailOK); unset($nacimientoOK); unset($si); unset($no);
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
	<div class="registros">
	<section class="container">
			<div class="center">
				<form action="registro.php" class="border p-3 form" method="post">
					<h1 class="login">Registro</h1>
					<div class="form-group text-center">
					<hr>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label  class="form-check-label" for="nombre">Nombre:</label>
										<input style="color:black; font-weight:500" class="form-control" id="nombre" type="text" name="nombre" value="<?= $nombreOK ?>">
									</div>
                  <?php if (isset($errores["nombre"])): ?>
                    <p class="alert alert-danger"><?= $errores["nombre"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
              <div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label  class="form-check-label" for="nombre">Apellido:</label>
										<input style="color:black; font-weight:500" class="form-control" id="apellido" type="text" name="apellido" value="<?= $apellidoOK ?>">
									</div>
                  <?php if (isset($errores["apellido"])): ?>
                    <p class="alert alert-danger"><?= $errores["apellido"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
            </div>
            <div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="nacimiento">Fecha de nacimiento:</label>
										<input style="color:black; font-weight:500" class="form-control" type="date" name="nacimiento" value="<?= $nacimientoOK ?>">
									</div >
                  <?php if (isset($errores["nacimiento"])): ?>
                    <p class="alert alert-danger"><?= $errores["nacimiento"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
						 	    <div class="input-group mb-3">
						 	    	<div class="input-group-prepend">
						 	    		<label class="form-check-label" for="pais">País:</label>
										<select  style="color:black; font-weight:500" class="form-control" id="pais" class="" name="pais">
											<?php foreach ($paisesRegistro as $value => $pais): ?>
                        <?php if ($_POST["pais"] == $value): ?>
                            <option style="color:black; font-weight:500" value="<?= $value ?>" selected> <?= $pais ?> </option>
                        <?php else : ?>
                            <option style="color:black; font-weight:500" value="<?= $value ?>"> <?= $pais ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="mail">E-mail:</label>
										<input style="color:black; font-weight:500" class="form-control" id="mail" type="email" name="mail" value="<?= $mailOK?>" >
									</div>
                  <?php if (isset($errores["mail"])): ?>
                    <p class="alert alert-danger"><?= $errores["mail"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="pass">Contraseña:</label >
										<input style="color:black; font-weight:500" style="color:black" class="form-control" id="pass" type="password" name="pass" value="">
									</div>
                  <?php if (isset($errores["pass"])): ?>
                    <p class="alert alert-danger"><?= $errores["pass"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="confirmpass">Confirmar contraseña:</label>
										<input style="color:black; font-weight:500" class="form-control" id="confirmpass" type="password" name="confirmpass" value="">
									</div>
                  <?php if (isset($errores["pass"])): ?>
                    <p class="alert alert-danger"><?= $errores["pass"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
								<label class="form-check-label" for="info">¿Desea recibir nuestras ofertas mensuales?</label>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6">
										<input style="color:black; font-weight:500" class="form-check-input" id="" type="radio" name="ofertas" value="si" <?= $si ?>><label class="form-check-label"> Sí</label>
								</div>
								<div class="form-group col-md-6">
										<input style="color:black; font-weight:500" class="form-check-input" id="" type="radio" name="ofertas" value="no" <?= $no ?>><label class="form-check-label"> No</label>
								</div>
                <?php if (isset($errores["ofertas"])): ?>
                  <p class="alert alert-danger"><?= $errores["ofertas"]?> </p>
                <?php endif; ?>
							</div>
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
								</div>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-primary" type="reset" >limpiar</button>
								<button class="btn btn-primary" type="submit" >crear usuario</button>
							</div>
					</div>
					</div>
				</form>
			</div>
		</section>
	</div>
<?php include_once("footer.php"); ?>
<?php require_once("script.php"); ?>
</body>
</html>
