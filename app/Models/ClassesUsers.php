<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesUsers extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'class_id',
    ];

    /**
     * Get the classes for the test.
     */
    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }
}
