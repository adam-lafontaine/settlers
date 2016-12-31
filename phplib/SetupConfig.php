<?php
define('__DAO_PATH__', dirname(__FILE__).'/dao');
require_once(__DAO_PATH__.'/SetupDAO.php');

class SetupConfig{
    
    public function getNumPlayers(){
        return SetupDAO::getNumPlayers();
    }
    
    //-----------------------------------
    
    public function getTileConfig(){
        $tiles = array();
        $types = SetupDAO::getTileTypes();
        $coords = SetupDAO::getTileCoords();
        
        for($row_idx = 0; $row_idx < count($types); $row_idx++){
            for($tile_idx = 0; $tile_idx < count($types[$row_idx]); $tile_idx++){
                $xpos = $coords[$row_idx][$tile_idx][0];
                $ypos = $coords[$row_idx][$tile_idx][1];
                array_push($tiles, array('type' => $types[$row_idx][$tile_idx], 'coords' => array('xpos' => $xpos, 'ypos' => $ypos)));
            }
        }
        
        return json_encode($tiles);            
    }
}

//==============================

class SetupConfigLoader{
    public static function load(){
        return new SetupConfig();
    }
}

