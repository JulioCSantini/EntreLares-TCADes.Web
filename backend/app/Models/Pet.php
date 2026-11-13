<?php

namespace App\Models;

use App\Enums\PetStatus;
use App\Enums\Species;
use Database\Factories\PetFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['registered_by', 'adopted_by', 'name', 'breed', 'species', 'location', 'photo_url', 'status'])]
class Pet extends Model
{
    /** @use HasFactory<PetFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'species' => Species::class,
            'status' => PetStatus::class,
        ];
    }

    public function registrar(): BelongsTo
    {
        return $this->belongsTo(User::class, 'registered_by');
    }

    public function adopter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'adopted_by');
    }
}
