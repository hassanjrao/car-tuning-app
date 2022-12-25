<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\ChipTuning;
use App\Models\Engine;
use App\Models\Type;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use function Symfony\Component\String\b;

class ImportChipTuningJob implements ToCollection, WithChunkReading, ShouldQueue
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

        $brands=Brand::all();
        $models=CarModel::all();
        $types=Type::all();
        $engines=Engine::all();

        $brands=$brands->keyBy('name')->toArray();
        $models=$models->keyBy('name')->toArray();
        $types=$types->keyBy('type')->toArray();
        $engines=$engines->keyBy('name')->toArray();


        $dataToInsert=[];

        foreach ($rows as $row) {

            $brandId = $brands[$row[1]]["id"];
            $modelId = $models[$row[2]]["id"];
            $typeId = $types[$row[3]]["id"];
            $engineId = $engines[$row[4]]["id"];

            $dataToInsert[] = [
                "name" => $row[0],
                "brand_id" => $brandId,
                "model_id" => $modelId,
                "type_id" => $typeId,
                "engine_id" => $engineId,
                "asset_original" => $row[5],
                "asset_after_tuning" => $row[6],
                "asset_result" => $row[7],
                "couple_original" => $row[8],
                "couple_after_tuning" => $row[9],
                "couple_result" => $row[10],
                "link" => $row[11],


                "created_at" => now(),
                "updated_at" => now()
            ];
        }

        ChipTuning::insert($dataToInsert);

    }
}
