<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    public function purchase()
    {
        return $this->hasMany('App\Models\PurchaseOrder');
    }
}
