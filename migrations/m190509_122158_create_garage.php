<?php

use yii\db\Migration;

/**
 * Class m190509_122158_create_garage
 */
class m190509_122158_create_garage extends Migration
{
    protected $tableName = 'garage';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'id_Ts' => $this->integer(),
            'name' => $this->string(),
            'status_Ts' => $this->string()
        ]);

        $tsTable = 'Ts';

        $this->addForeignKey('fk_garage_ts', $this->tableName, 'id_Ts', $tsTable,
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('garage');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_122158_create_garage cannot be reverted.\n";

        return false;
    }
    */
}
