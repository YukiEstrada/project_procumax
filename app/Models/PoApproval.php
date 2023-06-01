<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoApproval extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'PENDING';
    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_REJECTED = 'REJECTED';


    public function next_approval()
    {
        return $this->hasOne('App\Models\PoApproval', 'next_approval_id');
    }

    public function verifier()
    {
        return $this->belongsTo('App\Models\User', 'verifier_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\PurchaseOrder', 'po_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function createNextLevel($next_verifier_id)
    {
        $level = $this->position->level;
        $next_level = Position::where('level', '>', $level)->first();

        // Create new approval if there's next level
        if ($next_level && $next_verifier_id != null) {
            $new_approval = new PoApproval();
            $new_approval->po_id = $this->po_id;
            $new_approval->verifier_id = $next_verifier_id;
            $new_approval->status = $this::STATUS_PENDING;
            $new_approval->position_id = $next_level->id;
            $new_approval->save();

            $this->next_approval_id = $new_approval->id;
            $this->save();
        }
    }

    public function approve($next_verifier_id = null)
    {
        $current_approval = $this;
        $current_approval->status = $this::STATUS_APPROVED;
        $current_approval->save();
    }

    public function reject($next_verifier_id = null)
    {
        $current_approval = $this;
        $current_approval->status = $this::STATUS_REJECTED;
        $current_approval->save();
    }
}
