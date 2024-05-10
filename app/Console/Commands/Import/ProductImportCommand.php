<?php

namespace App\Console\Commands\Import;

use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Console\Command;

class ProductImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:product-import {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import product for given path';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->option('path');

        if(!$path){
            throw new \Exception("empty value for option [--path=]", 1);
            exit;
        }

        Excel::import(new ProductImport, $path);
        echo "\n ----------- SUCCESS ----------------\n\n";
    }
}
