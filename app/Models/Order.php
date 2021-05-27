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

    // public function storeData($input)
    // {
    //     return static::create($input);
    // }

    // public function findData($id)
    // {
    //     return static::find($id);
    // }

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
        return $this->hasOne('App\Models\Customer');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
