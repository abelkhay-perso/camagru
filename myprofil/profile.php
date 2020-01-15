<?php
    session_start();
    if (!$_SESSION['flag'] || !$_SESSION['username'])
    {
        echo "You don't have access to this page";
        exit();
    }
    $profile = "../images/profiles/" . $_SESSION['flag'] . ".png";
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<div class="content">
		<div class="profile">
            <?php if (file_exists($profile)):?>
                <img id="pp" class="pp" src="<?php echo $profile . "?" . uniqid(rand(), true)?>">
            <?php else:?>
                <img id="pp" class="pp" src="../images/system/profil_vide.jpg">
            <?php endif;?>

			<p id="usernameandage"><?php echo $_SESSION['username']?></p>
            <form  id="settings" class="settings" method="post"action="./indexmontage.php">
                    <input type="submit" value="Faire un montage">
            </form>
            <button id="loadcam" onclick="loadcam()">Parametres</button>
		</div>
		<div class="gallerycontainer">
			<div id="gallery" class='gallery'>
                <?php
                    session_start();
                    $files = glob('../images/montages/' . $_SESSION['flag'] . '[0-9].{jpg,png}', GLOB_BRACE);
                    natsort($files);
                    foreach (array_reverse($files) as $image){
                        echo '<form action="setprofile.php" method="post" style="display: inline;">';
                        echo '<input type="hidden" name="id" value="'. $image .'" />';
                        echo '<button type="submit" style="border:none;background-color:rgb(255, 255, 255);" title="">
                        <img style=""src="'. $image .'" class="pics"/></button>';
                        echo '</form>';
                    }
                ?>
			</div>
		</div>
		</div>

    <script>
        function loadcam(image)
        {
            window.parent.loadcam();
        }
    </script>
	</body>
       
</html>