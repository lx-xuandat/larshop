<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'status',
    ];

    public function getData()
    {
        return static::orderBy('created_at', 'desc')->get();
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_details', 'order_id', 'product_id');
    }
}
