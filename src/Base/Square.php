<?php

namespace Caro\Base;

class Square
{
  private Position $position;
  private Chess | null $chess = null;

  function __construct(Position $position, Chess | null $chess = null)
  {
    $this->position = $position;
    $this->chess = $chess;
  }

  function hasChess(): bool
  {
    return $this->chess !== null;
  }

  function putChess(Chess $chess): void
  {
    if(!$this->hasChess())
    {
      $this->chess = $chess;
    }else throw new \Exception('Square has chess! You can not put chess here!');
  }

	/**
	 * @return Position
	 */
	public function getPosition(): Position {
		return $this->position;
	}

	/**
	 * @return Chess|null
	 */
	public function getChess(): Chess|null {
		return $this->chess;
	}

	/**
	 * @param Chess|null $chess
	 * @return self
	 */
	public function setChess(Chess|null $chess): self {
		$this->chess = $chess;
		return $this;
	}
}
