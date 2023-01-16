<?php


namespace App\Classes;



class BinaryNode {

    public $data;
    public $left;
    public $right;

    public function __construct(int $data = NULL) {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }

    public function min() {
        $node = $this;

        while($node->left) {
            $node = $node->left;
        }
        return $node;
    }

    public function max() {
        $node = $this;

        while($node->right) {
            $node = $node->right;
        }
        return $node;
    }

    public function successor() {
        $node = $this;
        if($node->right)
            return $node->right->min();
        else
            return NULL;
    }

    public function predecessor() {
        $node = $this;
        if($node->left)
            return $node->left->max();
        else
            return NULL;
    }

}
