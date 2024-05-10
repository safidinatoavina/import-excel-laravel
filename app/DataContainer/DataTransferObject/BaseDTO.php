<?php
namespace App\DataContainer\DataTransferObject;

abstract class BaseDTO{
    
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

}
