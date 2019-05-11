<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_types}}`.
 *
 * yii migrate/create create_user_types_table --fields=name:string:notNull
 */
class m190511_143255_create_user_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_types}}');
    }
}
