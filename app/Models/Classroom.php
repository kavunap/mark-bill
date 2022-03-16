<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classroom
 *
 * @property $id
 * @property $name
 * @property $school_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Course[] $courses
 * @property School $school
 * @property Student[] $students
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Classroom extends Model
{
    
    static $rules = [
		'name' => 'required',
		'school_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','school_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'classroom_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Models\Student', 'classroom_id', 'id');
    }
    

}
