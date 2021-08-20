<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categorise}}`.
 */
class m210616_081830_create_categorise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categorise}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
            'name' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categorise}}');
    }
}
