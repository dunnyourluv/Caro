<?php

namespace Caro\Base;

class Player
{
  private string $name;
  private Chess $chess;

  function __construct(string $name, string $type)
  {
    $this->name = $name;
    $this->chess = new Chess(new Position(-1, -1), $type);
  }

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return Chess
	 */
	public function getChess(): Chess {
		return $this->chess;
	}

  function play(Game $game)
  {
    return $game->putChess($this);
  }

  function equal(Player $player): bool
  {
    return $this->name === $player->getName();
  }
}
