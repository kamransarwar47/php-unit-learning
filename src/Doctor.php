<?php

namespace App\src;

class Doctor extends AbstractPerson
{
    protected function getTitle()
    {
        return 'Dr.';
    }
}