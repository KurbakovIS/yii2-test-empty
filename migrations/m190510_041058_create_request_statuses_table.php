<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request_statuses}}`.
 *
 * yii migrate/create create_request_statuses_table --fields=name:\'enum("Создана","В работе","Приостановлена","Выполнена")\'
 */
class m190510_041058_create_request_statuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request_statuses}}', [
            'id' => $this->primaryKey(),
            'name' => 'enum("Создана","В работе","Приостановлена","Выполнена")',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request_statuses}}');
    }
}
