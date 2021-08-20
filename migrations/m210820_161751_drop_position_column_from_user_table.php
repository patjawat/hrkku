<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%user}}`.
 */
class m210820_161751_drop_position_column_from_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('user', 'github', $this->integer());
        $this->addColumn('user', 'line', $this->integer());
        $this->addColumn('user', 'password_reset_token', $this->string());
        $this->addColumn('user', 'status', $this->smallInteger()->notNull()->defaultValue(10));
        $this->addColumn('profile', 'pname', $this->string());
        $this->addColumn('profile', 'fname', $this->string());
        $this->addColumn('profile', 'lname', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','github');
        $this->dropColumn('user','line');
        $this->dropColumn('user','password_reset_token');
        $this->dropColumn('user','status');

        $this->dropColumn('profile','pname');
        $this->dropColumn('profile','fname');
        $this->dropColumn('profile','lname');
    }
}
