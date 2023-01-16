<?php


namespace App\Classes;


class Node

{
    private $data;
    private $next;

    public function __construct()
    {
        $this->data = 0;
        $this->data = null;
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setNext($next): void
    {
        $this->next = $next;
    }

    public function getNext()
    {
        return $this->next;
    }
}
