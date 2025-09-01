<?php

class ProgramWindow
{
    public $x;
    public $y;
    public $width;
    public $height;

    public function __construct(){
        $this -> x =0;
        $this -> y =0;
        $this -> width =800;
        $this -> height =600;
    }
    
    public function resize(size $size): void
    {
        $this->height = $size->height;
        $this->width = $size->width;
    }
    
    public function move(position $position): void
    {
        $this->y = $position->y;
        $this->x = $position->x;
    }

}
class Size
{
    public $height;
    public $width;

    public function __construct(int $height, int $width)
    {
        $this->height = $height;
        $this->width = $width;
    }
}
class Position
{
    public $y;
    public $x;

    public function __construct(int $y, int $x)
    {
        $this->y = $y;
        $this->x = $x;
    }
}
