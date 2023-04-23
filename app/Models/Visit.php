<?php

namespace App\Models;

use App\Models\Hospitals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;

    public function hospital()
    {
        return $this->hasOne(Hospitals::class, 'id', 'hospital_id');
    }
}
