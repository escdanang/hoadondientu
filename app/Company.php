<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company_table';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'representative', 'company_name', 'tax_number','email','address','phone_number','fax_number',
    ];

    public $timestamps = false;
}
