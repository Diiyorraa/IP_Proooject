<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'quantity'];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
