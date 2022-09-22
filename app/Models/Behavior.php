<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Behavior
 *
 * @property $id
 * @property $marks
 * @property $term
 * @property $student_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Behavior extends Model
{
    
    static $rules = [
		'marks' => 'required',
		'term' => 'required',
		'student_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marks','term','student_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function student()
    // {
    //     return $this->hasOne('App\Models\Student', 'id', 'student_id');
    // }
    
    /**
     * Get the student that owns the Behavior
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
