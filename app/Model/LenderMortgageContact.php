<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class LenderMortgageContact extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'lender_mortgage_contacts';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
