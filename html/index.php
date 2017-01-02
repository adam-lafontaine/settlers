<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/phplib/SetupConfigLoader.php');

function aprint($key, $value = ""){
    error_log(sprintf($key.": %s", $value));
}

$setup_config = SetupConfigLoader::getInstance();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body onload="startGame()">
        <script>
            var setup_config = {
                'num_players' : <?php echo $setup_config->getNumPlayers();?>,
                'tile_config' : <?php echo $setup_config->getTileConfig();?>,
                'x' : 'blank'
            };
        </script>
        <script src="js/config.js"></script>
        <script src="js/hextile.js"></script>
        <script src="js/gameboard.js"></script>
        <script src="js/maingame.js"></script>
    </body>

</html>
