<?php

namespace Caro\Base;

class Chess
{
  private string $type;
  private Position $position;

  function __construct(Position $position, string $type)
  {
    $this->position = $position;
    $this->type = $type;
  }

	/**
	 * @return string
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return self
	 */
	public function setType(string $type): self {
		$this->type = $type;
		return $this;
	}

	/**
	 * @return Position
	 */
	public function getPosition(): Position {
		return $this->position;
	}

	/**
	 * @param Position $position
	 * @return self
	 */
	public function setPosition(Position $position): self {
		$this->position = $position;
		return $this;
	}
}
