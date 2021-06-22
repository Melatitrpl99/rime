<?php

use App\Models\ProductStock;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SecondSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ProductStock([
            'product_id' => $row['product_id'],
            'size' => $row['size'],
            'dimensi' => $row['dimensi'],
            'warna' => $row['warna']
        ]);
    }
}
