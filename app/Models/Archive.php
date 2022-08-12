<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Archive
 *
 * @property $id
 * @property $year
 * @property $academic_year
 * @property $school_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Classroom[] $classrooms
 * @property School $school
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Archive extends Model
{
    
    static $rules = [
		'year' => 'required',
		'academic_year' => 'required',
		'school_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['year','academic_year','school_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classrooms()
    {
        return $this->hasMany('App\Models\Classroom', 'archive_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne('App\Models\School', 'id', 'school_id');
    }
    

}
