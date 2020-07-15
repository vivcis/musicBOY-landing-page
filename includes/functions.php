<?php 
	function subscribeUser($name, $email){
		global $connect;

		if (empty($name)) {
			array_push($_SESSION['errorMessage'], "<p class='error'>Oga enter your name!</p>");
		}
		if (empty($email)) {
			array_push($_SESSION['errorMessage'], "<p class='error'>Oga enter your email address!</p>");
		}

		if (empty($_SESSION['errorMessage'])) {
			if (emailExists($email)) {
				array_push($_SESSION['errorMessage'], "<p class='error'>Oga enter another email address, person don use this one!</p>");
			} else {
				$insertQuery = "INSERT INTO subscribers (name, email_address) VALUES (?, ?)";
				if ($stmt = $connect->prepare($insertQuery)) {
					$stmt->bind_param("ss", $name, $email);
					$stmt->execute();
					$stmt->close();

					$_SESSION['successMessage'] = "<p class='success'>Thank you for subcribing! We will keep you informed of latest developments.</p>";
				}
			}
		}
	}
	function emailExists($email){
		global $connect;

		$selectQuery = "SELECT email_address FROM subscribers WHERE email_address = ?";
		if ($stmt = $connect->prepare($selectQuery)) {
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->store_result();
			$stmt->fetch();
			if ($stmt->num_rows > 0) {
				$stmt->close();
				return true;
			}
			$stmt->close();
		}
		return false;
	}
 ?>