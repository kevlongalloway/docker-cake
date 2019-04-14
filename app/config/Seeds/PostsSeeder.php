<?php
use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class PostsSeeder extends AbstractSeed
{
    public function run()
    {
       $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->sentence(6,true),
                'body'      => $faker->sentences(3,true),
                'user_id' => 1,
                'created' => $faker->date(),
                'is_posted' => 1,
            ];
        }
        $posts = $this->table('posts');
        $posts->insert($data)
              ->save();
    }
}