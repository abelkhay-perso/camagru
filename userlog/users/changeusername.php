<?php
	session_start();
?>

<html>

	<head>
		<title>Camagru</title>
		<link rel="stylesheet" href="../style/index.css"/>
	</head>

	<body>
	<div id="header">
			<center>
				<h1 id="title"><a href="../../index.php" style="color:#07C; text-decoration: none;"> <font color="#FFFFFF">Cam<font color="#07C">a<font color="#07C">gru <font color="#FFFFFF">&reg; </a></h1>
				<h2 id="title2"><font color="#FFFFFF"/>Your <font color="#07C"/>Image Filter <font color="#FFFFFF"/> Web App </h2>
			</center>
			<?php if ($_SESSION['username'] == NULL): ?>
				<div id="log"><a href="../login.php" style="color:#07C">Log in</a>
					<form action="../signupform.php">
						<input type="submit" name="submit" value="Sign up">
					</form>
				</div>
			<?php else: ?>
				<div id="logout"><h3 id="title4"><font color="#FFFFFF"/>Hello <font color="#07C"/><?php echo $_SESSION['username'] ?></h3>
				<form action="../logout.php">
						<input id="logoutbutton" type="submit" name="submit" value="Log out"><br >
						<a href="../../index.php" style="color:#07C; position:relative; font-size: 17px; top:-4px; left:26px;">Home</a>
				</form>
				</div>
		</div>
    
        
        <div id="centerlog3">
            <form id="login-form" action="./changeuse.php" method= "POST">
                E-mail: <input type="text" name="email" value="" autocomplete> <br >
                New login: <input type="text" name="username" value=""> <br>
                Password: <input type="password" name="password" value="" autocomplete>
                <input type="submit" id="login-button" style="top:35px;" name="submit" value="Confirm">
                <span id="error">
                <?php
                echo $_SESSION['error'];
                $_SESSION['error'] = null;
                if (isset($_SESSION['change_success'])) {
                   header("Location: ./profil.php");
                    $_SESSION['change_success'] = null;
                }
                ?>
          </span>
            </form>
        </div>
    
		<div id=footer style="position:fixed; bottom:0; left:0px;height: 50px;background-color: #242729; width:100%;">
			<div id ="title3">- 2019 - @abekhay</div>
</div>
<?php endif; ?>
	</body>
</html>