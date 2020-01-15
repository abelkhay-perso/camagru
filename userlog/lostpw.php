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
        <form id="login-form2" action="./lostpw2.php" method= "POST">
            E-mail: <input type="text" name="email" value=""> <br >
            <input type="submit" id="login-button" name="submit" value="Confirm">
        </form><br /> <br />
        <span id="error" style="top:50px;">
                <?php
                echo $_SESSION['error'];
                $_SESSION['error'] = null;
                if (isset($_SESSION['lostpw_success'])) {
                  echo "An email has been sent to your email address";
                  $_SESSION['lostpw_success'] = null;
                }
                ?>
          </span> <br > <br > <br > <br > <br > <br > <br >
            <div id="signup"> No account? <a href="./signupform.php" style="color:#07C"> Sign up</a> </div>
    </div>
    </center>

    <div id=footer style="position:fixed; bottom:0; left:0px;height: 50px;background-color: #242729; width:100%;">
			<div id ="title3">- 2019 - @abekhay</div>
</div>
</body>

</html>