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
        #filtres img{
            pointer-events: none;
        }
        #preview{
            float:left;
            position:absolute;
            z-index:1;
        }
        #choix{
            width: 920px;
            overflow-x: scroll;
            overflow-y: hidden;
            height: 130px;
            white-space:nowrap
        }
        #choix img{
            width: 200px;
            height: 100px;
            position: relative;
        }
        #miniatures{
            border-style: solid;
            border-width: 2px 10px 4px 20px;
            overflow-y: scroll;
            height: 480px;
        }
        #miniatures > * {
            width: 200px;
            height: 100px;
        }
        form {
            display: inline;
        }


    </style>
</head>
<body>
<form  id="settings" class="settings" method="post"action="./profile.php">
                    <input type="submit" value="Retour au profil">
            </form>
<table style="margin-left:auto; margin-right:auto;">
    <tr>
        <td width="640">
            <div id="filtres"></div>
            <video autoplay></video>
            <img id="uploadedimg" height="480" width="640" onclick="getElements()" src='../images/system/nocam.png' hidden/>
        </td>

        <td> 
            <iframe src="./miniatures.php" height="480" width="270" style="border:none;"></iframe>
        </td>
    </tr>
    <tr>
        <td>
            <div>
                <form method="post" id="creation" name="savemontage" action="./montage.php" onclick="getElements()" onsubmit="return checkBeforeSubmit()">
                    <input type="hidden" name="url" value="" >
                    <input type="hidden" name="width" value="" >
                    <input type="hidden" name="height" value="" >
                    <input id="submitcreation" type="submit" value="Enregistrer le montage" disabled hidden>
                </form>
                <button><label for="files">Selectionner une image</label></button>
                <button id="loadcam" onclick="loadcam()" hidden>Retour a la webcam</button>
                <input id="files" style="visibility:hidden;" type="file" accept=".png" onchange="loadFile(event)">
            </div>
        </td>
    </tr>
    
</table>
<br />
<center>
    <iframe src="./list.php" height="140" width="920" style="border:none; " scrolling="no"></iframe>
</center>

<script src="functions.js"></script>
</body>
</html>