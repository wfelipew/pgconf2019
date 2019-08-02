<?php


use Phinx\Seed\AbstractSeed;

class ClassStatusSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $status=$this->table('status');
        $data=[
            [
                'id' => '101',
                'name' => 'arguardando_sala',
                'description' => 'Aguardando liberacao de sala'
            ]
        ];
        $status->insert($data);
    }
}
