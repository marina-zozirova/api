<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m221010_185538_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'info' =>$this->string(),
            'name' => $this->string(),
            'author' => $this->string(),
            'stargazers' => $this->integer(),
            'watchers' => $this->integer(),
        ]);

    }

    public function down()
    {
        $this->dropTable('test');
    }
}
