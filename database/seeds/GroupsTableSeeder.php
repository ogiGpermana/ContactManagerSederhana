<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();

        $groups = [
            [
                'id' => 1,
                'name' => 'Keluarga',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 2,
                'name' => 'Teman',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 3,
                'name' => 'Lain lain',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];

        DB::table('groups')->insert($groups);
    }
}
