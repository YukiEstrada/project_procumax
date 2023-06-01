<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_PENDING = 'PENDING';
    public const STATUS_APPROVED = 'COMPLETED';
    public const STATUS_REJECTED = 'REJECTED';


    public function user()
    {
        return $this->belongsTo('App\Models\User','requester_id');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor')->withTrashed();
    }

    public function details()
    {
        return $this->belongsToMany('App\Models\PoDetail', 'po_details', 'po_id','product_id')->withPivot('quantity', 'unit_price')->withTrashed();
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'po_details', 'po_id','product_id')->withPivot('quantity', 'unit_price')->withTrashed();
    }

    public function approval()
    {
        return $this->hasMany('App\Models\PoApproval', 'po_id');
    }

    public function getSubTotalAttribute($value)
    {   
        $subtotal = 0;
        foreach($this->products as $purchased_item){
            $subtotal += $purchased_item->pivot->quantity * $purchased_item->pivot->unit_price;
        }
        return $subtotal;
    }



}
