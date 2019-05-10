<?php

use yii\db\Migration;

/**
 * Class m190509_115852_create_feedback
 */
class m190509_115852_create_feedback extends Migration
{
    protected $tableName = 'feedback';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'id_client' => $this->integer(),
            'id_sto' => $this->integer(),
            'feedback_text' => $this->text(),
            'created_at' => $this->dateTime(),
            'work_evaluation' => $this->tinyInteger(),
            'cost_evaluation' => $this->tinyInteger(),
            'service _evaluation' => $this->tinyInteger()
        ]);
        $usersTable = 'users';
        $stoTable = 'sto';

        $this->addForeignKey('fk_feedback_users', $this->tableName, 'id_client', $usersTable,
            'id');
        $this->addForeignKey('fk_feedback_sto', $this->tableName, 'id_sto', $stoTable,
            'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('feedback');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190509_115852_create_feedback cannot be reverted.\n";

        return false;
    }
    */
}
