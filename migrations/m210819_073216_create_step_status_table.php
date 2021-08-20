<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step_status}}`.
 */
class m210819_073216_create_step_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->String()->notNull()
        ]);
        $this->insert('step_status', ['name'=> 'รอดำเนินการ']);
        $this->insert('step_status', ['name'=> 'กำลังดำเนินการ']);
        $this->insert('step_status', ['name'=> 'เสร็จสิ้นแล้ว']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%step_status}}');
    }
}
