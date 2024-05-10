<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index',['products' => Product::paginate(5)]);
    }

    public function importProduct(Request $request)
    {
        $request->validate(['file' => 'required|file']);

        Excel::import(new ProductImport, $request->file);

        return [
            'status' => 'success'
        ];

    }
}
