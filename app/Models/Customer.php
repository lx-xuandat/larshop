<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'phone',
        'email',
        'password',
        'address',
        'ward_street',
        'district',
        'province',
    ];

    public function getData()
    {
        return static::orderBy('created_at', 'desc')->get();
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }

    public function storeData($input)
    {
        return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
