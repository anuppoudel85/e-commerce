<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currentPrice()
    {
        if ($this->on_sale)
            return $this->sale_price . " <del>{$this->price}</del>";

        return $this->price;
    }
}
