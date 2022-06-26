<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->truncateTables();

        User::factory(1)->create([
            'role' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
        User::factory(49)->create();
        $this->call([
            ServiceSeeder::class,
            ScheduleSeeder::class,
            // AppointmentSeeder::class,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Truncate all the database tables.
     *
     * @return void
     */
    protected function truncateTables(): void
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $t = "Tables_in_" . config('database.connections.mysql.database');

            if ($table->$t !== config('database.migrations')) {
                DB::table($table->$t)->truncate();
            }
        }
    }
}
