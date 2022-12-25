<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChipTuning extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function model(){
        return $this->belongsTo(CarModel::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function engine(){
        return $this->belongsTo(Engine::class);
    }
}
