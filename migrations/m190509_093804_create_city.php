<?php

use yii\db\Migration;

/**
 * Class m190509_093804_create_city
 */
class m190509_093804_create_city extends Migration
{
    protected $tableName = 'city';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'timezone' => $this->tinyInteger(),
            'id_region' => $this->integer()
        ]);
        $regionTable = 'region';

        $this->addForeignKey('fk_city_region',  $this->tableName, 'id_region',$regionTable,
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('city');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_093804_create_city cannot be reverted.\n";

        return false;
    }
    */
}
