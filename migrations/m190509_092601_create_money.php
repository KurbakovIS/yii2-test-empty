<?php

use yii\db\Migration;

/**
 * Class m190509_092601_create_money
 */
class m190509_092601_create_money extends Migration
{
    protected $tableName = 'currency';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code_currency'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_092601_create_money cannot be reverted.\n";

        return false;
    }
    */
}
