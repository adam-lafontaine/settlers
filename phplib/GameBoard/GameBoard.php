<?php

require_once(dirname(dirname(__FILE__)).'/GameConfig.php');

abstract class GameBoard{
    abstract public function getTiles();
}