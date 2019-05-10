<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vip_cards}}`.
 *
 * yii migrate/create create_vip_cards_table --fields=number:integer:notNull,status:\"ENUM(\'use\',\'block\')\",created_at:integer:notNull,updated_at:integer
 */
class m190510_054457_create_vip_cards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vip_cards}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer()->notNull(),
            'status' => 'ENUM("use","block")',
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vip_cards}}');
    }
}
