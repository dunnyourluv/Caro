<?php

namespace Caro\Base;

class Board
{
  /**
   * @var Square[][]
   */
  private $squares = [];

  function __construct()
  {
    for($i = 0; $i < 3; $i++)
    {
      for($j = 0; $j < 3; $j++)
      {
        $this->squares[$i][$j] = new Square(new Position($i, $j));
      }
    }
  }

  function hasSquareFromPosition(Position $position)
  {
    return $position->getX() >= 0 && $position->getX() < 3 && $position->getY() >= 0 && $position->getY() < 3;
  }

  function getSquare(Position $position)
  {
    for($i = 0; $i < 3; $i++)
    {
      for($j = 0; $j < 3; $j++)
      {
        $square = $this->squares[$i][$j];
        $squarePosition = $square->getPosition();
        if($squarePosition->equal($position))
        {
          return $square;
        }
      }
    }

    return null;
  }

  function show()
  {
    for ($i = 0; $i < 3; $i++) {
      for ($j = 0; $j < 3; $j++) {
          $square = $this->squares[$i][$j];
          $chess = $square->getChess();

          if ($chess !== null) {
              echo $chess->getType() . ' ';
          } else {
              echo '_ ';
          }
      }
      echo "\n";
  }
  }
}
