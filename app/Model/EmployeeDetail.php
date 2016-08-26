<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class EmployeeDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='employee_details';
    protected $fillable = [
        'username', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function State() {
        return $this->belongsTo('App\Model\State','state'); // links this->state_id to state.id
    }
    public function Branch() {
        return $this->belongsTo('App\Model\Branch','branch_id'); // links this->state_id to state.id
    }
}
