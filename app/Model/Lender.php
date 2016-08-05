<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Lender extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'lenders';

    public function state() {
        return $this->belongsTo('State'); // links this->state_id to state.id
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
