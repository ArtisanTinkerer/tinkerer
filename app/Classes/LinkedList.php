<?php

namespace App\Classes;

class LinkedList
{
    private $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function insertAtEnd($data)
    {
        $newNode = new Node();
        $newNode->setData($data);

        if ($this->head) {
            $currentNode = $this->head; //get the first one
            //loop to the end
            while ($currentNode->getNext() != null){
                //go to the next one
                $currentNode = $currentNode->getNext();
            }
            //assign the new one one to the next for the last node;
            $currentNode->setNext($newNode);

        } else {
            $this->head = $newNode;
        }
    }

    public function insertAtBeginning($data)
    {
        $newNode = new Node();
        $newNode->setData($data);

        if ($this->head) {
            //new one points the old head
            $newNode->setNext($this->head);
            //new one is now head
            $this->head = $newNode;
        } else { //this is the first one
            $this->head = $newNode;
        }

    }

    public function insertAfterSpecified($data, $target)
    {
        if ($this->head) { //we have some
            $currentNode = $this->head;
            //find the target node
            while($currentNode->getData() != $target && $currentNode->getNext() != null){
                $currentNode = $currentNode->getNext();
            }

            if($currentNode->getData() == $target){ //found it
                $newNode = new Node();
                $newNode->setData($data);

                $currentNodeNext = $currentNode->getNext();
                $currentNode->setNext($newNode);
                $newNode->setNext($currentNodeNext);
            }
        }
    }

    public function insertBeforeSpecified($data, $target)
    {
        //need previous to change the pointer

        if ($this->head) { //we have some
            $currentNode = $this->head;
            $previousNode = null;
            //find the target node
            while($currentNode->getData() != $target && $currentNode->getNext() != null){
                $previousNode = $currentNode;
                $currentNode = $currentNode->getNext();
            }

            if($currentNode->getData() == $target){ //found it
                $newNode = new Node();
                $newNode->setData($data);

                if($previousNode) {
                    $previousNode->setNext($newNode);
                    $newNode->setNext($currentNode);
                } else { //insert at the start
                    $previousNode = $newNode;
                    $previousNode->setNext($currentNode);
                    $this->head = $previousNode;
                }

            }
        }
    }

    public function deleteNode($target)
    {
        if ($this->head) { //we have some
            //set the start point
            $currentNode = $this->head;
            $previousNode = null;
            //find the target node
            while ($currentNode->getData() != $target && $currentNode->getNext() != null) {
                $previousNode = $currentNode;
                $currentNode = $currentNode->getNext();
            }

            if($currentNode->getData() == $target){
                if($previousNode){
                    //needs to point to the next one
                    $previousNode->setNext($currentNode->getNext());
                    unset($currentNode);
                } else { //it is at the new start
                    $this->head = $currentNode->getNext();
                    unset($currentNode);
                }

                return true;
            }
            return false;
        }
    }


}
