<?php


namespace App\Classes;


class ListToTreeNode
{
    public $val;
    public $left;
    public $right;


    public function __construct($val = null, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
