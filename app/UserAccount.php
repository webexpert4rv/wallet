<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_account';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'transaction_type', 'amount'];
}
