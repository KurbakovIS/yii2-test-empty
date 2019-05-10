<?php

use yii\db\Migration;

/**
 * Class m190509_094823_create_region
 */
class m190509_094823_create_region extends Migration
{
    protected $tableName = 'region';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'id_country' => $this->integer()
        ]);

        $countryTable = 'country';

        $this->addForeignKey('fk_region_country', $this->tableName, 'id_country', $countryTable,
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('region');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_094823_create_region cannot be reverted.\n";

        return false;
    }
    */
}
