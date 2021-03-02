<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * KYC Model
 *
 *  Manage the User Submitted KYC
 *
 * @package TokenLite
 * @author Softnio
 * @version 1.1
 * @method static orderBy(string $string, string $string1)
 * @method static FindOrFail($id)
 */
class EntitiesShareRight extends Model
{
    /*
     * Table Name
     */
    protected $table = 'entities_share_rights';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function check_share_class(){
        return $this->belongsTo('App\Models\EntitiesShareClasses', 'share_class_id', 'id');
    }

}
