<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'animal_type_id',
        'title',
        'born'
    ];

    protected $appends = [
        'size'
    ];

    protected $with = [
        'animalType'
    ];

    /*
    * Get remaining lifetime in percentage
    */
    public function getSizeAttribute()
    {
        $animalType = AnimalType::whereId($this->animal_type_id)->first();

        $animalLifetime = $animalType->lifetime / $animalType->growth_multiplier;

        $bornDate = Carbon::parse($this->born);

        $deathDate = Carbon::parse($this->born)->addYears($animalLifetime)->timestamp;

        $bornDate = $bornDate->timestamp;

        $timeDiff = $deathDate - $bornDate;

        $current = Carbon::now()->timestamp - $bornDate;

        $progress = round(($current / $timeDiff) * 100, 2);

        if ($progress > 100) {
            $progress = 100;
        } elseif ($progress < 10) {
            $progress = 10;
        }

        return $progress;
    }

    public function animalType()
    {
        return $this->belongsTo(AnimalType::class, 'animal_type_id', 'id');
    }
}
