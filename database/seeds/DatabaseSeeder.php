<?php

use AdminDatabaseSeeder;
use SettingDarabaseSeeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingDarabaseSeeeder::class);
        $this->call(AdminDatabaseSeeder::class);
    }
}
