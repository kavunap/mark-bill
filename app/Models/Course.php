<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 *
 * @property $id
 * @property $title
 * @property $descriprion
 * @property $credits
 * @property $hours
 * @property $classroom_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Classroom $classroom
 * @property Mark[] $marks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Course extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'credits' => 'required',
		'hours' => 'required',
		'classroom_id' => 'required',
        'user_id'=>'required',
        'max'=>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','credits','hours','classroom_id','user_id','max'];


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
    public function tests()
    {
        return $this->hasMany('App\Models\Test', 'course_id', 'id');
    }
    

}
