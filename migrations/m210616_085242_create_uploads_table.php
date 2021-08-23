<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%uploads}}`.
 */
class m210616_085242_create_uploads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%uploads}}', [
            'upload_id' => $this->primaryKey(),
            'ref' => $this->string(50),
            'file_name' => $this->string(255),
            'real_filename' => $this->string(255),
            'create_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'type' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%uploads}}');
    }
}
