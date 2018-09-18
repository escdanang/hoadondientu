<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table='customers_table';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'tax_number', 'name_of_unit', 'customer_name','email','address','phone_number','fax_number',
    ];

    public $timestamps = false;
}
