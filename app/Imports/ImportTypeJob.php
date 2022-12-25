<?php

namespace App\Imports;

use App\Models\Type;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportTypeJob implements ToCollection, WithChunkReading, ShouldQueue
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

        $data = [];

        $inserteddata=[];

        foreach ($rows as $row) {

            if (!in_array($row[3], $inserteddata)) {

                $inserteddata[] = $row[3];
                $data[]= [
                    "type" => $row[3],
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }


        Type::insert($data);
    }
}
