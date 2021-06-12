<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subject_id',
    ];

    /**
     * Get the subject for the test.
     */
    public function subject()
    {
        return $this->hasOne(Subjects::class, 'id', 'subject_id');
    }
    public function testss()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
