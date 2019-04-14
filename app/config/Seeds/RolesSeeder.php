<?php
use Phinx\Seed\AbstractSeed;


class RolesSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            ['role' => 'Author'],
            ['role' => 'Editor']
        ];
            
        $roles = $this->table('roles');
        $roles->insert($data)
              ->save();
    }
}