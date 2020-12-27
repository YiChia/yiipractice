<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account_info}}`.
 */
class m201202_073033_create_account_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account_info}}', [
            'id' => $this->primaryKey(),
            'account' => $this->string(),
            'name' => $this->string(),
            'gender' => $this->boolean(),
            'email' => $this->string(),
            'birthday' => $this->date(),
            'memo' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%account_info}}');
    }
}
