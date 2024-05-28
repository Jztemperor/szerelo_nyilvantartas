<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkOrder extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(Part::class)->withPivot('quantity');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }


    public function calculateTotal($hourlyCost)
    {
        $total = 0;
        foreach ($this->tasks as $task) {
            $total += $task->duration * $hourlyCost;
        }

        foreach ($this->parts as $part) {
            $total += $part->price * $part->pivot->quantity;
        }

        return $total;
    }
}
