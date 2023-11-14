<?php

namespace Caro\Base;

class Position
{
  private int $x;
  private int $y;

  function __construct(int $x, int $y)
  {
    $this->x = $x;
    $this->y = $y;
  }

	/**
	 * @return int
	 */
	public function getX(): int {
		return $this->x;
	}

	/**
	 * @param int $x
	 * @return self
	 */
	public function setX(int $x): self {
		$this->x = $x;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getY(): int {
		return $this->y;
	}

	/**
	 * @param int $y
	 * @return self
	 */
	public function setY(int $y): self {
		$this->y = $y;
		return $this;
	}

  function equal(Position $position): bool
  {
    return $this->x === $position->getX() && $this->y === $position->getY();
  }

}
