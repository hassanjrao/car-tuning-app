<?php

namespace App\Imports;

use App\Models\Engine;
use App\Models\Type;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportEngineJob implements ToCollection, WithChunkReading, ShouldQueue
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

            if (!in_array($row[4], $inserteddata)) {

                $inserteddata[] = $row[4];
                $data[]= [
                    "name" => $row[4],
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }


        Engine::insert($data);
    }
}
