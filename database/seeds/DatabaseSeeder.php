<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        DB::table('users_access')->truncate();
        DB::table('users')->truncate();

        $faker = Faker::create('pt_BR');

        echo "Criando tabela de usuarios. \n";
        foreach (range(1,500) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'active'=> (bool)rand(0,1)
            ]);
        }

        echo "Criando tabela de acessos. \nEsse processo pode demorar!\n";
        foreach (range(1,5000) as $index) {
            DB::table('users_access')->insert([
                'last_login' => $faker->dateTimeThisYear('now'),
                'user_id' => rand(1,500)
            ]);
        }
        echo "Tudo Pronto!\n";
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
