<?php
require_once(dirname(__FILE__).'/NumberTile.php');

class NumberTileLoader{
    public static function getInstance($num_alpha){
        
        if($num_alpha){
            $prob = NUMBER_PROB[$num_alpha['num']];        
            return new NumberTile($num_alpha['num'], $num_alpha['alpha'], $prob);
        }
        else{
            return null;
        }
        
    }
}