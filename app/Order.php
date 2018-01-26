<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $fillable = [
        'number',
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
