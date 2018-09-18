<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products_table';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'product_code', 'product_name', 'price','unit_of_calculation','product_description',
    ];

    public $timestamps = false;
}
