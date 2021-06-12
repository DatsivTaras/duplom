<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'quantity',
        'description',
        'price'
    ];

    /**
     * Get the subject for the test.
     */
    public function tests()
    {
        return $this->hasMany(Tests::class, 'subject_id', 'id');
    }

    /**
     * Get the subject for the test.
     */
    public function subjectUser()
    {
        return $this->hasMany(SubjectsUsers::class, 'subject_id', 'id');
    }
}
