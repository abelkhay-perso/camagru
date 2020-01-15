<?php 
    session_start();
?>
<html>

<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="style/index.css" />
</head>

<body>
    <div id="header">
            <center>
            <h1 id="title"><a href="../index.php" style="color:#07C; text-decoration: none;"> <font color="#FFFFFF"/>Cam<font color="#07C"/>a<font color="#07C"/>gru <font color="#FFFFFF"/>&reg; </a></h1>
            <h2 id="title2"><font color="#FFFFFF"/>Your <font color="#07C"/>Image Filter <font color="#FFFFFF"/> Web App </h2>
            </center>
			<div id="log"><a href="./login.php" style="color:#07C">Log in</a>
				<form action="./signupform.php">
					<input type="submit" name="submit" value="Sign up">
				</form>
			</div>
    </div>
    <center>
    <div id="centerlog">
        <form id="login-form" action="./signup.php" method= "POST">
            Email : <input type="mail" name="email" value=""> <br >
            Login : <input type="text" name="username" value=""> <br >
            Password : <input type="password" name="password" value="" autocomplete> <br > <br >
            <input type="submit" id="login-button" name="submit" value="Sign up">
            <span  style="color:red; left: 25px; position:relative;">
                <?php
                echo $_SESSION['error'];
                $_SESSION['error'] = null;
                if (isset($_SESSION['signup_success'])) {
                    echo "Signup success please check your mail box";
                    $_SESSION['signup_success'] = null;
                }
                ?>
          </span>
        </form>
    </div>
    </center>

    <div id=footer style="position:fixed; bottom:0; left:0px;height: 50px;background-color: #242729; width:100%;">
			<div id ="title3">- 2019 - @abekhay</div>
    </div>
</body>

</html>