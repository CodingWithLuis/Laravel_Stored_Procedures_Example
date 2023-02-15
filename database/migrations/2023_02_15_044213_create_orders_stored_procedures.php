<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS countOrdersByStatus;');

        DB::unprepared(
            'CREATE PROCEDURE countOrdersByStatus(
                IN orderStatus VARCHAR(50),
                OUT total INT
            )

            BEGIN
                SELECT COUNT(order_number)
                INTO total
                FROM orders
                WHERE status = orderStatus; 
            END;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_stored_procedures');
    }
};
