<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'image', 'name','plu','price','stock', 'weight','description','category'
    ];

}
