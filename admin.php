<?php 
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

$account = new Account($con);

	if(isset($_POST["submitButton"])){
		
		$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
		$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

		$success = $account->loginAdmin($username,$password);

		if($success){
			$_SESSION["userLoggedIn"] = $username;
			header("Location: adminPage.php");
		}
	}

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to TMflix</title>
	<link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>
	
	<div class="signInContainer">

		<div class="column">
			<div class="header">
				<img src="assets/images/logo.png" title="Logo" alt="Site logo">
				<h3>Administrator Sign In</h3>
				<span>to continue to TMflix admin page</span>

			</div>

			<form method="POST">

				<?php echo $account->getError(Constants::$loginFailed); ?>
				<input type="text" name="username" placeholder="User name" value="<?php getInputValue("username"); ?>" required>

				<input type="password" name="password" placeholder="Password" required>

				<input type="submit" name="submitButton" value="SUBMIT">

			</form>
			<a href="login.php" class="signInMessage">Login page</a>
			

		</div>

	</div>

</body>
</html>