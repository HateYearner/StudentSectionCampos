<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'capacity'
    ];

    /**
     * Get the students for the section.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
