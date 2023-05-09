<?php

namespace WPatricio\CieloApi\Resources;

class CieloCustomer
{
    private $name = null;

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
}
