<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Client;
use App\Models\StatusReclamations;
use App\Models\ServiceChargeReclamation;


use App\Models\Reclamation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(User::class, 1)->create();
        factory(Client::class, 10)->create();
        factory(ServiceChargeReclamation::class, 10)->create();
        factory(StatusReclamations::class, 3)->create();
        factory(Reclamation::class, 10)->create();
        
    }
}
