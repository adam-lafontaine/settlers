<?php

class SetupDAO{
    
    public static function getNumPlayers(){
        //todo query db
        
        return 4;
    }
    
    //-----------------------------------
    
    public static function getTileCoords(){
        //todo query db
        // calculate here for now
        
        $num_rows = 4;  
        
        return calcTileCoords($num_rows);
    }
    
    //----------------------------------
    
    public static function getTileTypes(){
        //todo query db
        // calculate here for now        
        
        return makeTileTypeArray();
    }
    
}// end class

// temporay funtions to simulate db
//================================

// 3 - 4 player setup
function makeTileTypeArray(){
    $resources = array();
    
    for($i = 0; $i < 3; $i++){
        array_push($resources, 'ore');
        array_push($resources, 'brick');        
    }
    
    for($i = 0; $i < 4; $i++){
        array_push($resources, 'wood');
        array_push($resources, 'sheep');  
        array_push($resources, 'wheat');        
    }    
    array_push($resources, 'desert');
    shuffle($resources);
    
    $num_sides = 6;
    
    //add resource tiles
    $result = array();
    for($row_idx = 0; $row_idx < 3; $row_idx++){
        array_push($result, array());
        $num_tiles = max($row_idx * $num_sides, 1);
        for($tile_idx = 0; $tile_idx < $num_tiles; $tile_idx++){
            array_push($result[$row_idx], array_pop($resources));
        }
    }    
    
    $two4one = array();
    array_push($two4one, '241ore');
    array_push($two4one, '241brick');
    array_push($two4one, '241wood');
    array_push($two4one, '241sheep');
    array_push($two4one, '241wheat');
    shuffle($two4one);
    
    $three4one = array();
    for($i = 0; $i < 4; $i++){
        array_push($three4one, '341');
    }
    
    $trades = array(); // alternate 241 and 341
    for($i = 0; $i < 9; $i++){
        if($i % 2 ==0){
            array_push($trades, array_pop($two4one));
        }
        else{
            array_push($trades, array_pop($three4one));
        }
    }
    
    $sea = array(); // alternate trades and blank
    for($i = 0; $i < 18; $i++){
        if($i % 2 == 0)
        {
            array_push($sea, array_pop($trades));
        }
        else{
            array_push($sea, 'sea');
        }           
    }
    
    array_push($result, $sea); 
    
    return $result;
}

//---------------------------------

function calcTileCoords($num_rows){
    $coords = array();
    
    for($row = 0; $row < $num_rows; $row++){
        array_push($coords, calcTileRowCoords($row));
    }
    
    return $coords;
}

//-----------------------------------------------

function calcTileRowCoords($row_num){
    $coords = array();
    
    // calculate for tile of side length 1 centered at the origin
    // client responsible for scaling coordinates properly and rendering
    $tile_size = 1;
    $center_x = 0;
    $center_y = 0;
    
    $num_sides = 6;
    $full_rotation = 2 * pi();
    $tile_length = $tile_size * 2;
    $tile_height = $tile_size * sqrt(3);     
    $num_tiles = max($row_num * $num_sides, 1);
    $dx = $tile_size * 1.5;
    $xdir_map = array(1, 0, -1, -1, 0, 1);
    $ydir_map = array(-1, -1, -1, 1, 1, 1);
    $xpos = $center_x;
    $ypos = $center_y + $row_num * $tile_height;
    
    array_push($coords, array($xpos, $ypos));
    
    for($i = 0; $i < $num_sides; $i++){
        for($j = 0; $j < $row_num; $j++){
            $xdir = $xdir_map[$i];
            $ydir = $ydir_map[$i];
            $dy = ($xdir == 0 ? $tile_height : $tile_height / 2);
            $xpos += ($xdir * $dx);
            $ypos += ($ydir * $dy);
            if(!($i == $num_sides - 1 && $j == $row_num - 1)){ // do not make duplicate of first tile in row
                array_push($coords, array($xpos, $ypos));
            }
        }
        
    }
    
    return $coords;    
}