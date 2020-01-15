<?php
session_start();
if (!$_GET["flag"])
{
	echo "You don't have access to this page";
	exit();
}
include_once '../functiondb/verify.php';
?>
<html>

	<head>
		<title>Camagru</title>
		<link rel="stylesheet" href="style/index.css"/>
	</head>

	<body>
		<div id="header">
			<center>
				<h1 id="title"><a href="../index.php" style="color:#07C; text-decoration: none;"> <font color="#FFFFFF">Cam<font color="#07C">a<font color="#07C">gru <font color="#FFFFFF">&reg; </a></h1>
				<h2 id="title2"><font color="#FFFFFF"/>Your <font color="#07C"/>Image Filter <font color="#FFFFFF"/> Web App </h2>
			</center>
			<div id="log"><a href="login.php" style="color:#07C">Log in</a>
				<form action="signupform.php">
					<input type="submit" name="submit" value="Sign up">
				</form>
			</div>
		</div>
        <center>
        <div id="centerlog">
            <div id="check">
            <?php if (verify($_GET["flag"]) == 0) { ?>
                <strong>
                <font color="#07C"/>Your account as been verified <br > <br > <br > <br >
                <font color="#FFFFFF"/> Thank you for joining our community! <br > <br > <br > <br > <br > 
                    Click below for <a href="login.php" style="color:#07C">Log in</a> <br >
                </strong>
                <?php } else { ?>
                <strong>
                    Sorry <br > <br >
                    Account not found
                </strong>
            <?php } ?>
        </div>
                </div>

		<div id=footer style="position:fixed; bottom:0; left:0px;height: 50px;background-color: #242729; width:100%;">
			<div id ="title3">- 2019 - @abekhay</div>
</div>
	</body>
</html>