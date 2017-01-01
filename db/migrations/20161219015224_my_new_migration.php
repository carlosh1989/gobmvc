<?php

use Phinx\Migration\AbstractMigration;

class MyNewMigration extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('tags');
        $table->addColumn('tag_name', 'string')
              ->save();

        $refTable = $this->table('tag_relationships');
        $refTable->addColumn('tag_id', 'integer')
                 ->addForeignKey('tag_id', 'tags', 'id')
                 ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
