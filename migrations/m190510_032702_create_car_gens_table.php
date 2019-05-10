<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_gens}}`.
 *
 * yii migrate/create create_car_gens_table --fields=name:string:notNull
 */
class m190510_032702_create_car_gens_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_gens}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_gens}}');
    }
}
