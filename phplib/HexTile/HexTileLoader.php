<?php
require_once(dirname(__FILE__).'/HexTile.php');

class HexTileLoader{
    
    public static function getInstance($type, $coord){
        return new HexTile($type, $coord, null);
    }
    
    //-----------------------------------
    
    public static function getArray($types, $coords, $num_tiles){
        $tiles = array();
        
        $num_alphas = array_reverse($num_tiles);
        for($idx = 0; $idx < count($types); $idx++){
            if(isResource($types[$idx])){
                array_push($tiles, new HexTile($types[$idx], $coords[$idx], array_pop($num_alphas)));
            }
            else{
                array_push($tiles, new HexTile($types[$idx], $coords[$idx], null));
            }
        }
        
        return $tiles;
    }
    
    //------------------------------------   
}

function isResource($type){
        return ($type === RESOURCE_ORE ||
                    $type === RESOURCE_BRICK ||
                    $type === RESOURCE_WOOD ||
                    $type === RESOURCE_SHEEP ||
                    $type === RESOURCE_WHEAT);
}