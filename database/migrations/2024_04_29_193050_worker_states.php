<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
        CREATE OR REPLACE VIEW worker_states_views AS
            SELECT users.name,
                CASE
                    WHEN users.id IN (
                        SELECT users.id
                        FROM (users INNER JOIN user_work_order ON users.id = user_work_order.user_id)
                            INNER JOIN work_orders ON user_work_order.work_order_id = work_orders.id
                        WHERE users.role_id = 2 AND
                            work_orders.status != "finished" AND
                            work_orders.status != "closed")
                    THEN "Working"
                ELSE "Free"
                END AS state, COUNT(*) AS works
            FROM (users INNER JOIN user_work_order ON users.id = user_work_order.user_id)
                INNER JOIN work_orders ON user_work_order.work_order_id = work_orders.id
            WHERE users.role_id = 2 AND
                work_orders.status != "finished" AND
                work_orders.status != "closed"
            GROUP BY users.id
        UNION
        SELECT users.name,
            CASE
                WHEN users.id IN (
                    SELECT users.id
                    FROM (users INNER JOIN user_work_order ON users.id = user_work_order.user_id)
                        INNER JOIN work_orders ON user_work_order.work_order_id = work_orders.id
                    WHERE users.role_id = 2 AND
                        work_orders.status != "finished" AND
                        work_orders.status != "closed")
                THEN "Working"
            ELSE "Free"
            END AS state, 0 as works
        FROM (users INNER JOIN user_work_order ON users.id = user_work_order.user_id)
            LEFT JOIN work_orders ON user_work_order.work_order_id = work_orders.id
        WHERE users.role_id = 2 AND
            work_orders.status = "finished" OR
            work_orders.status = "closed" OR work_orders.status = NULL
        ');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS worker_states_views');
    }
};
