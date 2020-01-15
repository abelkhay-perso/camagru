<?php
    session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="style/index.css" />
</head>

<body>
    <div id="header">
            <center>
            <h1 id="title"><a href="../index.php" style="color:#07C; text-decoration: none;"> <font color="#FFFFFF">Cam<font color="#07C">a<font color="#07C">gru <font color="#FFFFFF">&reg; </a></h1>
            <h2 id="title2"><font color="#FFFFFF">Your <font color="#07C">Image Filter <font color="#FFFFFF"> Web App </h2>
            </center>
			<div id="log"><a href="./login.php" style="color:#07C">Log in</a>
				<form action="./signupform.php">
					<input type="submit" name="submit" value="Sign up">
				</form>
			</div>
    </div>
    <center>
    <div id="centerlog">
        <form id="login-form" action="./connect.php" method= "POST">
            E-mail: <input type="text" name="mail" value=""> <br >
            Password: <a href="./lostpw.php" id="recoveringpw" style="color:#07C"> Lost password ?</a>  <input type="password" name="password" value="" autocomplete> <br><br >
            <input type="submit" id="login-button" name="submit" value="Log in">
        </form><br /> <br />
        <span id="error" style="top:10px;">
                <?php
                if (isset($_SESSION['error'])){
                     echo $_SESSION['error'];
                    $_SESSION['error'] = null;
                }
                ?>
          </span>
            <div id="signup"> No account? <a href="./signupform.php" style="color:#07C"> Sign up</a> </div>
    </div>
    </center>

    <div id=footer style="position:fixed; bottom:0; left:0px;height: 50px;background-color: #242729; width:100%;">
			<div id ="title3">- 2019 - @abekhay</div>
</div>
</body>

</html>