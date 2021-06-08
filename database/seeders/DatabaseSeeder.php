<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                "nom" => "Admin",
                "prenom" => "Admin",
                "email" => "admin@gmail.com",
                "password" => "$2y$10$0Cj2iDLGVpTcrYsLsT/sy.WP2shy4rLZ/nkKU2o/m5ZGROP.AU2vy",
                "grade" => "admin",
                "numtel" => "26333111",
                "date_naissance" => "1994-10-10",
                "photo" => "images/mpcTMikOk25zbWxnUMZ0eN4mpuoLUUp9JsZCRf3F.png"
            ]
        ]);
    }
}
