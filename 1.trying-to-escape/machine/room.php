<?php

namespace Machine
{
    class Room
    {
        public $x;
        public $y;

        public $p_room;

        public function __construct($x, $y, $p_room = null)
        {
            $this->x = $x;
            $this->y = $y;

            $this->p_room = $p_room;
        }
    }

}
