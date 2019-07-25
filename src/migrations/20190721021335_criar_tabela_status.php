<?php

use Phinx\Migration\AbstractMigration;

class CriarTabelaStatus extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $status = $this->table('status');
        $status->addColumn('name','string')
            ->addColumn('description','string',[
                'null' => true,
            ]);
        $status->create();
        $status->insert([
            [
                'id' => '1',
                'name' => 'prevista',
                'description' => 'Turma com apenas previsao de data'
            ],
            [
                'id' => '2',
                'name' => 'aguardando_quorum',
                'description' => 'Turma com aguardando quorum minimo'
            ],
            [
                'id' => '3',
                'name' => 'confirmada',
                'description' => 'Turma confirmada'
            ],
            [
                'id' => '4',
                'name' => 'cancelada',
                'description' => 'Turma cancelada'
            ],
             
        ]);
        
        $status->saveData();
        $this->execute('ALTER SEQUENCE status_id_seq RESTART WITH 100');
    }
}
