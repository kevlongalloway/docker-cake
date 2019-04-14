<?php
use Migrations\AbstractMigration;

class CreatePosts extends AbstractMigration
{
	public function change()
    {
        $table = $this->table('posts');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('body', 'string', [
            'default' => null,
            'null' => false,
        ]);
         $table->addColumn('is_posted', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}