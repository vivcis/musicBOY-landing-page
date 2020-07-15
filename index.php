<?php 
	session_start();
	$_SESSION['errorMessage'] = array();
	$_SESSION['successMessage'] = "";
	include "includes/db_config.php";
	include "includes/functions.php";

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		subscribeUser($name, $email);
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8"/>
 	<meta name="viewport" content='width=device-width, height=device-height, initial-scale=1.0'/>
 	<meta name="author" content="Cecilia Orji"/>
 	<title>MusicBoy</title>
 	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
 </head>
 <body>
 	<div class="form">	
 		<div class="form-content" style="margin-bottom: 2em; <?=!empty($_SESSION['errorMessage']) | !empty($_SESSION['successMessage']) ? '' : 'display: none';?>">	
 			<?php foreach($_SESSION['errorMessage'] as $message) {
	 			echo $message;
	 		}
	 		echo $_SESSION['successMessage'];?>
 		</div>
	 	<form method="post" class="form-content" style = "<?=empty($_SESSION['successMessage']) ? '' : 'display: none';?>">
	 		<h3 class="title-centered">Subscribe to our newsletter</h3>
	 		
 			<div class="input">	
		 		<label for="#name">Name: </label>
		 		<input id="name" type="text" name="name" value="<?=isset($name) ? $name : "";?>" /><br/>	
 			</div>	
 			<div class="input">
	 			<label for="#email">Email: </label>
	 			<input id="email" type="email" name="email" value="<?=isset($email) ? $email : ""?>" /><br/>
	 		</div>
	 		<button class="submit" type="submit" name="submit">Subscribe</button><br><br><br>
	 	</form>
 	</div>
 </body>
 </html>