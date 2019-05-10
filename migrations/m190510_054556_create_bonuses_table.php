<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bonuses}}`.
 */
class m190510_054556_create_bonuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bonuses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'size' => $this->double()->notNull(),
            'used_count' => $this->integer(),
            'max_count' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bonuses}}');
    }
}
