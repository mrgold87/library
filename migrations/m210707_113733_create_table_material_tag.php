<?php

use yii\db\Migration;

/**
 * Class m210707_113733_create_table_material_tag
 */
class m210707_113733_create_table_material_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%material_tag}}', [
            'id' => $this->primaryKey(),
            'material_id' => $this->integer(10)->notNull(),
            'tag_id' => $this->integer(10)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%material_tag}}');
    }
}
