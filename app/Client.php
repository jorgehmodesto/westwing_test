<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * @var string
     */
    protected $table = 'clients';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * @var bool
     */
    public $timestamps = true;
}
