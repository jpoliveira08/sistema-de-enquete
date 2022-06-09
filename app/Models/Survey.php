<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'begins_in', 'expires_in'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
