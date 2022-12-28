<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'products_sales';

    protected $primaryKey = 'id_sale';

    protected $fillable = [
        'no_ticket', 'status','total_price','id_user'
    ];
}
