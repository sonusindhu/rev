<?php
namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'branches';

    public function states() {
     return  $this->belongsTo('App\Model\Branch','state_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
