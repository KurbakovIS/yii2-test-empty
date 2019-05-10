<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_equips}}`.
 *
 * yii migrate/create create_car_equips_table --fields=name:string:notNull
 */
class m190510_031900_create_car_equips_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_equips}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_equips}}');
    }
}
