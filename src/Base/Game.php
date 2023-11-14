<?php

namespace Caro\Base;

class Game
{
  private Player $playerFirst;
  private Player $playerSecond;
  private Player $playingPlayer;
  private Board $board;
  private bool $isStart = false;

  function __construct(Player $pl1, Player $pl2, Board $board)
  {
    $this->playerFirst = $pl1;
    $this->playerSecond = $pl2;
    $this->playingPlayer = $pl1;
    $this->board = $board;
  }

  function checkWin(): bool
  {
    return true;
  }

  function notify(string $message): void
  {
    echo $message . PHP_EOL;
  }

  /**
   * @return Player
   */
  public function getPlayerFirst(): Player
  {
    return $this->playerFirst;
  }

  /**
   * @param Player $playerFirst
   * @return self
   */
  public function setPlayerFirst(Player $playerFirst): self
  {
    $this->playerFirst = $playerFirst;
    return $this;
  }

  /**
   * @return Player
   */
  public function getPlayerSecond(): Player
  {
    return $this->playerSecond;
  }

  /**
   * @param Player $playerSecond
   * @return self
   */
  public function setPlayerSecond(Player $playerSecond): self
  {
    $this->playerSecond = $playerSecond;
    return $this;
  }

  /**
   * @return Board
   */
  public function getBoard(): Board
  {
    return $this->board;
  }

  /**
   * @param Board $board
   * @return self
   */
  public function setBoard(Board $board): self
  {
    $this->board = $board;
    return $this;
  }

  function start(): void
  {
    if (!$this->isStart) {
      $this->notify($this->getWelcomeMessage());
      $this->isStart = true;
    }

    while (true) {
      $player = $this->playingPlayer;
      if ($player->play($this)) {
        $this->playingPlayer = $this->switchPlayer();
      }
    }
  }

  function switchPlayer()
  {
    return $this->playingPlayer === $this->playerFirst ? $this->playerSecond : $this->playerFirst;
  }

  public function putChess(Player $player)
  {
    $position = $this->getPosition($player);

    $square = $this->board->getSquare($position);

    if ($square) {
      $chess = new Chess($position, $player->getChess()->getType());
      try {
        $square->putChess($chess);
        return true;
      } catch (\Throwable $th) {
        $this->notify($th->getMessage());
        return $this->putChess($player);
      }
    }
  }

  public function getPosition(Player $player)
  {
    $positionInput = $this->getInput("{$player->getName()} turn pls enter your position to move(x, y): ");
    $position = new Position($positionInput[0], $positionInput[1]);
    if (!$this->board->hasSquareFromPosition($position)) {
      return $this->getPosition($player);
    }
    return $position;
  }

  /**
   * @return string[]
   */
  function getInput(string $message)
  {
    return explode(' ', readline($message . PHP_EOL));
  }

  private function getWelcomeMessage(): string
  {
    return "Hi {$this->playerFirst->getName()} and {$this->playerSecond->getName()}! Let's play!";
  }
}
