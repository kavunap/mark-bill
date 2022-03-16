<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mark
 *
 * @property $id
 * @property $marks
 * @property $term
 * @property $type
 * @property $student_id
 * @property $course_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Course $course
 * @property Student $student
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mark extends Model
{
    
    static $rules = [
		'marks' => 'required',
		'term' => 'required',
		'type' => 'required',
		'student_id' => 'required',
		'course_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marks','term','type','student_id','course_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }
    

}
