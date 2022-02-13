<?php

/**
 * @author    Linju Jayaprakash <linjujp@gmail.com>
 * @license   @linju
 * @copyright 2022, Linju Jayaprakash
 * 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'age', 'gender', 'teacher_id'];

    /**
     * Get the teacher associated with the student.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
