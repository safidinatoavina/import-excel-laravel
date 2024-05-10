<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use App\DataContainer\Enum\ProductType;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Repository\Product\ProductRepository;
use App\DataContainer\DataTransferObject\DTOs\ProductDTO;

class ProductImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $collection->each(function($data,$key){
            
            if($key==0) return; //the head of excel

            $productDTO = new ProductDTO([
                'name'          => $data[0],
                'price'         => $data[1],
                'description'   => $data[2],
                'type'          => $data[3]=='cbd'?ProductType::CBD:ProductType::COLLAGENE
            ]);

            if(!ProductRepository::addNewProduct($productDTO)){
                throw new \Exception("Error Create product (".$productDTO->name.")", 1);
            }

        });
    }
}
