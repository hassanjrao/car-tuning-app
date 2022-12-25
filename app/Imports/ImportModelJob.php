<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportModelJob implements ToCollection, WithChunkReading, ShouldQueue
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

        $models = [];

        $insertedModel=[];

        foreach ($rows as $row) {

            if (!in_array($row[2], $insertedModel)) {

                $insertedModel[] = $row[2];
                $models[]= [
                    "name" => $row[2],
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }


        CarModel::insert($models);
    }
}
