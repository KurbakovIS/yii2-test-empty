<?php

use yii\db\Migration;

/**
 * Class m190509_093227_create_country
 */
class m190509_093227_create_country extends Migration
{
    protected $tableName = 'country';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'id_currency' => $this->integer()
        ]);
        $currencyTable = 'currency';

        $this->addForeignKey('fk_country_currency',  $this->tableName, 'id_currency',$currencyTable,
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_093227_create_country cannot be reverted.\n";

        return false;
    }
    */
}
