<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @property $id
 * @property $done_on
 * @property $term
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property $course_id
 *
 * @property Course $course
 * @property Mark[] $marks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Test extends Model
{
    
    static $rules = [
		'done_on' => 'required',
		'term' => 'required',
		'type' => 'required',
		'course_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['done_on','term','type','course_id','max'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marks()
    {
        return $this->hasMany('App\Models\Mark', 'test_id', 'id');
    }
    

}
