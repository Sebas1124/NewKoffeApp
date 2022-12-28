<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_details extends Model
{
    use HasFactory;

    protected $table = 'sales_detail';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_sale','products','quantity','unitary_price'
    ];
}
