<?php

use yii\db\Migration;

/**
 * Class m210707_111228_create_table_author
 */
class m210707_111228_create_table_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'material_id' => $this->integer(10)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }

}
