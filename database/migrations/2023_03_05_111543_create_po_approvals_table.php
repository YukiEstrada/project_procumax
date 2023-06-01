<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('po_id')
            ->constrained('purchase_orders');
            $table->foreignId('verifier_id')
            ->constrained('users');
            $table->foreignId('next_approval_id')
            ->nullable()
            ->constrained('po_approvals');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_approvals');
    }
}
