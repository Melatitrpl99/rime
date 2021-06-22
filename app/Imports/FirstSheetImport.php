<?php

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FirstSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'nama' => $row['nama_barang'],
            'harga_customer' => $row['harga_cust']
        ]);
    }
}
