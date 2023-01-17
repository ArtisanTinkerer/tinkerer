<?php


namespace App\Classes;


class BinaryTree
{
    public $root = null;

    public function __construct(int $data)
    {
        $this->root = new BinaryNode($data);
    }

    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    public function insert(int $data)
    {
        if($this->isEmpty()) {
            $node = new BinaryNode($data);
            $this->root = $node;
            return $node;
        }

        $node = $this->root;

        while($node) { //traversing to see where to place
            if($data > $node->data) {
                if($node->right) {
                    $node = $node->right;
                } else { //insert
                    $node->right = new BinaryNode($data);
                    $node = $node->right;
                    break;
                }

            } elseif($data < $node->data) {
                if($node->left) {
                    $node = $node->left;
                } else { //insert
                    $node->left = new BinaryNode($data);
                    $node = $node->left;
                    break;
                }
            } else {
                break;
            }
        }
        return $node;

    }

    public function traverse(BinaryNode $node)
    {
        if ($node) {
            if ($node->left)
                $this->traverse($node->left);

            echo $node->data . "\n";

            if ($node->right)
                $this->traverse($node->right);


        }
    }
}
