<?php
use Migrations\AbstractMigration;

class CreateUserRoles extends AbstractMigration
{
	public function change()
    {
        $table = $this->table('roles');
        $table->addColumn('role', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}