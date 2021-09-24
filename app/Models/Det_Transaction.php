<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Det_Transaction extends Model
{
    use HasFactory;

    protected $table = 'det_transaction';
    public $timestamps = false;

    protected $fillable = ['id_transaction','id_product','qty','subtotal'];
}
