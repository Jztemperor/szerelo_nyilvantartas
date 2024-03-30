<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    use HasFactory;

    public function workorders(): HasMany
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
