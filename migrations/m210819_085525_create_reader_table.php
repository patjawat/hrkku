<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reader}}`.
 */
class m210819_085525_create_reader_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reader}}', [
            'id' => $this->primaryKey(),
            'sex' => $this->string()->notNull()->comment('เพศ'),
            'fname' => $this->string()->notNull()->comment('ชื่อ'),
            'lname' => $this->string()->notNull()->comment('นามสกุล'),
            'position' => $this->string()->notNull()->comment('ตำแหน่ง'),
            'major' => $this->string()->notNull()->comment('สาขาวิชา'),
            'affiliation' => $this->string()->notNull()->comment('สังกัด'),
            'contact' => $this->string()->notNull()->comment('ที่อยู่'),
            'email' => $this->string()->comment('Email'),
            'phone' => $this->string()->comment('เบอร์โทร')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reader}}');
    }
}
