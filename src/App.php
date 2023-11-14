<?php
use Caro\Base\Board;
use Caro\Base\Game;
use Caro\Base\Player;

require_once __DIR__. '/../vendor/autoload.php';

class App {

  static function main()
  {
    $uyeng = new Player('Uyeng', 'X');
    $dung = new Player('Dung', 'O');
    $board = new Board();
    $game = new Game($uyeng, $dung, $board);

    $game->start();
  }
}


App::main();
