<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();

        $faker = Faker::create();
        $contacts = [];

        foreach (range(1, 20) as $index)
        {
            $contacts[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'company' => $faker->company,
                'phone' => $faker->phoneNumber,
                'address' => "{$faker->streetName} {$faker->postCode} {$faker->city}",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'group_id' => rand(1, 3)
            ];
        }

        DB::table('contacts')->insert($contacts);
    }
}
