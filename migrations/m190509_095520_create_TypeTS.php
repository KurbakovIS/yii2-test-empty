<?php

use yii\db\Migration;

/**
 * Class m190509_095520_create_TypeTS
 */
class m190509_095520_create_TypeTS extends Migration
{
    protected $tableName = 'typeTS';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('typeTS');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_095520_create_TypeTS cannot be reverted.\n";

        return false;
    }
    */
}
