<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsUsers extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'subject_id',
    ];

    /**
     * Get the subject for the test.
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'id', 'subject_id');
    }
}
