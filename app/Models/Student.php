<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property $id
 * @property $name
 * @property $parent_phone
 * @property $st_code
 * @property $classroom_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Classroom $classroom
 * @property Mark[] $marks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Student extends Model
{
    
    static $rules = [
		'name' => 'required',
		'parent_phone' => 'required',
		'classroom_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','parent_phone','classroom_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classroom()
    {
        return $this->hasOne('App\Models\Classroom', 'id', 'classroom_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marks()
    {
        return $this->hasMany('App\Models\Mark', 'student_id', 'id');
    }
    

}
