<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tracking_position}}`.
 */
class m210819_072001_create_tracking_position_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tracking_position}}', [
                'id' => $this->primaryKey(),
                'name' => $this->String()->notNull()
        ]);

        $this->insert('tracking_position', ['name'=> 'ผู้ช่วยศาสตราจารย์']);
        $this->insert('tracking_position', ['name'=> 'รองศาสตราจารย์']);
        $this->insert('tracking_position', ['name'=> 'ศาสตราจารย์']);
        $this->insert('tracking_position', ['name'=> 'ศาสตราจารย์ได้รับเงินประจำตำแหน่งสูงขึ้น']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tracking_position}}');
    }
}
