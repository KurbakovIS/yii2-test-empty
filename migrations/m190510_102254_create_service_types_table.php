<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_types}}`.
 *
 * yii migrate/create create_service_types_table --fields=name:integer:notNull
 */
class m190510_102254_create_service_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service_types}}');
    }
}
