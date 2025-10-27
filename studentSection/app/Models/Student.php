<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'student_id',
        'date_of_birth',
        'phone',
        'section_id'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Get the section that owns the student.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the student's full name.
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
