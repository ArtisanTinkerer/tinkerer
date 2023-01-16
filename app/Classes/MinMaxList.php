<?php


namespace App\Classes;


class MinMaxList
{
    public $list = [];
    private $max = null;
    private $min = null;


    public function append($value)
    {
        $this->list[] = $value;

        if($this->max === null || $value > $this->max){
            $this->max = $value;
        }

        if($this->min === null || $value < $this->min){
            $this->min = $value;
        }
    }


    public function popMax()
    {
        $index = array_search($this->max, $this->list);
        echo "popping " . $this->list[$index];
        $popped = $this->list[$index];

        unset($this->list[$index]);

        //now set the new max
        if(count($this->list) > 0) {
            $this->max = max($this->list);
        } else {
            $this->max = null;
        }

        return $popped;

    }

    public function popMin()
    {
        $index = array_search($this->min, $this->list);
        echo "popping " . $this->list[$index];
        $popped = $this->list[$index];

        unset($this->list[$index]);

        //now set the new min
        if(count($this->list) > 0) {
            $this->min = min($this->list);
        } else {
            $this->min = null;
        }

        return $popped;
    }



}
