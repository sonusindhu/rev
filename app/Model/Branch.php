<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Branch extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'branches';

    public function validate($input) {

        $rules = array(
            'data[Branch][office]' => 'Required',
            'data[Branch][manager]' => 'Required',
            'data[Branch][address]' => 'Required|Min:3|Max:80|Alpha',
            'data[Branch][city]' => 'Required|Min:3|Max:80|Alpha',
            'data[Branch][state_id]' => 'Required|Min:3|Max:80|Alpha',
            'data[Branch][zipcode]' => 'Required|Min:5|Max:5|numeric',
            'data[Branch][phone]' => 'Required|Min:3|Max:80|numeric',
            'data[Branch][telephone]' => 'Required|Min:3|Max:80|numeric',
        );
        $finalRules=array();
        $final_input=array();
        if (isset($rules)) {
            foreach ($rules as $key => $value) {
                $zet = str_replace('data[Branch][', '', $key);
                $zets = str_replace(']', '', $zet);
                $finalRules[$zets] = $value;
            }
        }
        if (isset($input['data']['Branch']) and ! empty($input['data']['Branch'])) {
            foreach ($input['data']['Branch'] as $key => $value) {
                $final_input[$key] = $value;
            }
        }
        $v = Validator::make($final_input, $finalRules);
        return $v;
    }

    public function states() {
        return $this->belongsTo('App\Model\Branch', 'state_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
