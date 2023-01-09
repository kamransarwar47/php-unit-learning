<?php

namespace App\src;

abstract class AbstractPerson
{
    protected $lastName;

    public function __construct($lastName)
    {
        $this->lastName = $lastName;
    }

    abstract protected function getTitle();

    public function getNameAndTitle()
    {
        return $this->getTitle() . ' ' . $this->lastName;
    }
}