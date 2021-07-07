<?php

use yii\db\Migration;

/**
 * Class m210707_112908_create_table_link
 */
class m210707_112908_create_table_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%link}}', [
            'id' => $this->primaryKey(),
            'material_id' => $this->integer(10)->notNull(),
            'title' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%link}}');
    }
}