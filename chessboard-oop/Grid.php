<?php

class Grid
{
    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * @var array
     */
    protected $data = array();

    
    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }
    
    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    
    /**
     * @return array
     */
    public function getGrid()
    {
        $row = array();

        for ($col = 0; $col < $this->y; $col++) {
            ($col % 2) ? $defaultRow = 1 : $defaultRow = 0;     // not even : even
            for ($square = 0; $square < $this->x; $square++) {
                if ($defaultRow == 0) {
                    ($square % 2) ? $num = 1 : $num = 0;
                }    
                if ($defaultRow == 1) {
                    ($square % 2) ? $num = 0 : $num = 1;
                }
                $row[] = $num;
            }
            $this->data[$col] = $row;
            unset($row);
        }
        return $this->data;
    }
    
    public function writeGrid()
    {
        echo '<table class="chessboard">';
        foreach ($this->data as $tabRow) {
            echo '<tr>';
            foreach ($tabRow as $square) {
                if ($square == 0) {
                    echo '<td class="white"></td>';
                }
                if ($square == 1) {
                    echo '<td class="black"></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}