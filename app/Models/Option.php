<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount_of_votes'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
