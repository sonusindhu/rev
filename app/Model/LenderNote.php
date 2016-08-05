<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class LenderNote extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'lender_notes';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
