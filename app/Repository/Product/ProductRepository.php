<?php
namespace App\Repository\Product;

use App\DataContainer\DataTransferObject\DTOs\ProductDTO;
use App\Models\Product;

class ProductRepository{
    
    public static function addNewProduct(ProductDTO $productDTO):Product
    {
        return   Product::create([
            'name'         => $productDTO->name,
            'price'        => $productDTO->price,
            'description'  => $productDTO->description,
            'type'         => $productDTO->type->value()
        ]);
    }

}
