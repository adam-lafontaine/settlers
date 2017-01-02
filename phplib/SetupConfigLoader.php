<?php
define('__DAO_PATH__', dirname(__FILE__).'/dao');
define('__GAMEBOARD_PATH__', dirname(__FILE__).'/GameBoard');

require_once(__DAO_PATH__.'/SetupDAO.php');
require_once(__GAMEBOARD_PATH__.'/GameBoardLoader.php');

class SetupConfig{
    
    public function getNumPlayers(){
        return SetupDAO::getNumPlayers();
    }
    
    //-----------------------------------
    
    public function getTileConfig(){
        $board = GameBoardLoader::getInstance();
        $tiles = $board->getTiles();
        
        $tile_config = array();
        
        foreach($board->getTiles() as $tile){
            $xpos = $tile->getCoord()['xpos'];
            $ypos = $tile->getCoord()['ypos'];
            array_push($tile_config, array('type' => $tile->getType(), 'num_alpha' => $tile->getNumAlpha(), 'coords' => array('xpos' => $xpos, 'ypos' => $ypos)));
            
        }
        
        return json_encode($tile_config);            
    }
}

//==============================

class SetupConfigLoader{
    public static function getInstance(){
        return new SetupConfig();
    }
}

