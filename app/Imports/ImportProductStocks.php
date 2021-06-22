<?php

namespace App\Imports;

use App\Models\ProductStock;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProductStocks implements ToModel, SkipsOnFailure
{
    use SkipsFailures;

    public function model(array $row)
    {
        // dd($row);
        return new ProductStock([
            'product_id' => $row[0],
            'size' => $row[2],
            'dimensi' => $row[1],
            'warna' => $row[3]
        ]);
    }
}
