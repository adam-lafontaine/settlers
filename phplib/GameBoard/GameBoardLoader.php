<?php
require_once(dirname(__FILE__).'/BasicGameBoard.php');

class GameBoardLoader{
    public static function getInstance(){
        return new BasicGameBoard();
    }
}