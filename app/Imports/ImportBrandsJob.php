<?php

namespace App\Imports;

use App\Models\Brand;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportBrandsJob implements ToCollection, WithChunkReading, ShouldQueue
{
    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $rows = $rows->forget(0);

        $brands = [];

        $insertedBrand=[];

        foreach ($rows as $row) {



            if (!in_array($row[1], $insertedBrand)) {

                $insertedBrand[] = $row[1];

                $brands[]= [
                    "name" => $row[1],
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }


        Brand::insert($brands);
    }
}
