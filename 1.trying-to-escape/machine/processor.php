<?php

namespace Machine
{
    //use Machine\Room as Room;
    //use Machine\Registry as Registry;

    class Processor
    {
        public $map = array();
        //public $current_room = null;

        public function __construct($map)
        {
            $this->map = $map;
        }

        public function step($room)
        {
            // мы пришли в комнату в правом верхнем углу
            if ($room->x == 0 && $room->y == 4)
            {
                Registry::increaseNumberOfWays();

                return;
            }

            $x = $room->x;
            $y = $room->y;
            // здесь мы пытаемся пройти во все стороны из текущей комнаты
            // вниз
            if (($x + 1) <= 2 && $this->map[$x + 1][$y] && !$this->hasInWay($x + 1, $y, $room->p_room)) {
                $newRoom = new Room($x + 1, $y, $room);

                $this->step($newRoom);
            }

            //влево
            if (($y - 1) >= 0 && $this->map[$x][$y - 1] && !$this->hasInWay($x, $y - 1, $room->p_room))
            {
                $newRoom = new Room($x, $y - 1, $room);
                $this->step($newRoom);
            }

            //вверх
            if (($x - 1) >= 0 && $this->map[$x - 1][$y] && !$this->hasInWay($x - 1, $y, $room->p_room)) {
                $newRoom = new Room($x - 1, $y, $room);

                $this->step($newRoom);
            }

            //вправо
            if (($y + 1 <= 4) && $this->map[$x][$y + 1] && !$this->hasInWay($x, $y + 1, $room->p_room)) {
                $newRoom = new Room($x, $y + 1, $room);

                $this->step($newRoom);
            }

        }

        protected function hasInWay($x, $y, $room = null)
        {
            if (isset($room)) {
                if ($x == $room->x && $y == $room->y)
                    return true;
                else
                    return $this->hasInWay($x, $y, $room->p_room);
            }

            return false;
        }

    }

}
