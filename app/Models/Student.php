<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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
    use Searchable;
    
    // public function searchableAs()
    // {
    //     return 'students_index';
    // }

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();
 
    //     // Customize the data array...
 
    //     return $array;
    // }

    static $rules = [
		'name' => 'required',
		// 'parent_phone' => 'min:10|max:10',
		'classroom_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','parent_phone','classroom_id','sex'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function classroom()
    // {
    //     return $this->hasOne('App\Models\Classroom', 'id', 'classroom_id');
    // }
    /**
     * Get the classroom that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marks()
    {
        return $this->hasMany('App\Models\Mark', 'student_id', 'id');
    }
    
    /**
     * Get all of the behaviors for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function behaviors()
    {
        return $this->hasMany(Behavior::class);
    }

}
