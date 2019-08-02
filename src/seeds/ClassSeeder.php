<?php


use Phinx\Seed\AbstractSeed;

class ClassSeeder extends AbstractSeed
{
    
    public function getDependencies(){
        return [
            'ClassStatusSeeder'
        ];
    }
    
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
        $class=$this->table('class');
        $data = [
            /*Turma cancelada*/
            [
                'date_begin' => '2019-01-01',
                'date_end'  => '2019-02-01',
                'course_id' => '2',
                'status' => '4'
            ],
            /*Turma com confirmada com data no passado*/
            [
                'date_begin' => '2019-01-01',
                'date_end'  => '2019-02-01',
                'course_id' => '2',
                'status' => '3'
            ],
            /*Turma confirmada*/
            [
                'date_begin' => '2019-09-01',
                'date_end'  => '2019-09-20',
                'course_id' => '2',
                'status' => '3'
            ],
            /*Turma prevista*/
            [
                'date_begin' => '2019-09-01',
                'date_end'  => '2019-09-20',
                'course_id' => '2',
                'status' => '1'
            ],
            /*Turma aguardando quorum*/
            [
                'date_begin' => '2019-10-01',
                'date_end'  => '2019-10-20',
                'course_id' => '2',
                'status' => '2'
            ],
            /*Turma com status custom*/
            [
                'date_begin' => '2019-09-01',
                'date_end'  => '2019-09-20',
                'course_id' => '3',
                'status' => '101'
            ],
        ];
        $class->insert($data);
    }
}
