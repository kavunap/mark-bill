<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mark
 *
 * @property $id
 * @property $marks
 * @property $student_id
 * @property $test_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @property Test $test
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mark extends Model
{
    
    static $rules = [
		'marks' => 'required',
		'student_id' => 'required',
		'test_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marks','student_id','test_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function student()
    // {
    //     return $this->hasOne('App\Models\Student', 'id', 'student_id');
    // }

    /**
     * Get the student that owns the Mark
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function test()
    // {
    //     return $this->hasOne('App\Models\Test', 'id', 'test_id');
    // }

    /**
     * Get the test that owns the Mark
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    

}
