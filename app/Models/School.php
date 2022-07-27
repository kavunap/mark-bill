<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @property $id
 * @property $name
 * @property $location
 * @property $type
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Classroom[] $classrooms
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class School extends Model
{
    
    static $rules = [
		'name' => 'required',
		'location' => 'required',
		'type' => 'required',
		'user_id' => 'required',
        'stamp' => 'image|mimes:jpeg,png,jpg|max:2024',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','location','type','user_id','email','phone','stamp','director'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classrooms()
    {
        return $this->hasMany('App\Models\Classroom', 'school_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
