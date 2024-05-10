<?php
namespace App\DataContainer\Enum;

enum ProductType{

    case CBD;
    case COLLAGENE;
    
    public function value(): string
    {
        return match($this) 
        {
            ProductType::CBD => 'cbd',   
            ProductType::COLLAGENE => 'Collagène',   
        };
    }
}
