<?php

namespace App\Model;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class State extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'states';

    public function lender() {
        return $this->hasOne('Lender'); // links this->id to lender.state_id
    }
    
    public function state_license() {
        return $this->hasOne('StateLicense','state_id'); // links this->id to lender.state_id
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
