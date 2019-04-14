<?php
use Phinx\Seed\AbstractSeed;


class UsersSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
            'name' => 'Kevlon',
            'email' => 'kevlongalloway1999m@gmail.com',
            'password' => '$2y$10$grhSP/sZNsivI4P0Q3GBT.vIBLwG3cJQxdlKWusZiAZzt9GJ57s7.',
            'role_id' => 1,
            'created' => $faker->date()
            ],
            [
            'name' => 'Author',
            'email' => 'author@email.com',
            'password' => '$2y$10$ob4eOCAeHS9IdVs/O4qlZumiCAUHpjzzGTqtbdv2cYpPpPfUR5vGy', //secret
            'role_id' => 1,
            'created' => $faker->date()
            ],
            [
            'name' => 'Editor',
            'email' => 'Editor@email.com',
            'password' => '$2y$10$ob4eOCAeHS9IdVs/O4qlZumiCAUHpjzzGTqtbdv2cYpPpPfUR5vGy', //secret
            'role_id' => 2,
            'created' => $faker->date()
            ]
        ];
            
        $roles = $this->table('users');
        $roles->insert($data)
              ->save();
    }
}