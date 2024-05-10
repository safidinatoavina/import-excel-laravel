<?php
namespace App\DataContainer\DataTransferObject\DTOs;

use App\DataContainer\DataTransferObject\BaseDTO;

class ProductDTO extends BaseDTO{

    /** @var name string */
    public $name;

    /** @var price int */
    public $price;

    /** @var description string  */
    public $description;
    
    /** @var type App\DataContainer\Enum\ProductType */
    public $type;

}
