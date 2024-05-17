<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Part extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'price'];

    public function workorders(): BelongsToMany
    {
        return $this->belongsToMany(WorkOrder::class)->withPivot('quantity');
    }
}
