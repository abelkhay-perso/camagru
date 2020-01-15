<?php 
    session_start();
    if (!$_SESSION['flag'])
    {
        echo "You don't have access to this page";
        exit();
    }
?>
<html>
<head>
    <style>
        #miniatures{
            border-style: solid;
            border-width: 2px 10px 4px 20px;
            width: 200px;

        }
    </style>
</head>
<body>
    <div id="miniatures">
        <?php
            session_start();
            $files = glob('../images/montages/' . $_SESSION['flag'] . '*.{jpg,png}', GLOB_BRACE);
            natsort($files);
            foreach (array_reverse($files) as $image){
                echo '<form action="./delete.php" method="post">';
                echo '<input type="hidden" name="id" value="'. $image .'" />';
                echo '<button  type="submit" class="delete" title=""><img height="180" width="180" src="'. $image .'" alt="" /></button>';
                echo '</form>';
            }
        ?>
    </div>
</body>
</html>