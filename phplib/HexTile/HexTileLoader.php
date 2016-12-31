<?php
require_once(dirname(__FILE__).'/HexTile.php');

class HexTileLoader{
    
    public static function getInstance($type, $coord){
        return new HexTile($type, $coord);
    }
    
    public static function getArray($types, $coords){
        $tiles = array();
        for($idx = 0; $idx < count($types); $idx++){
            array_push($tiles, new HexTile($types[$idx], $coords[$idx]));
        }
        
        return $tiles;
    }
}