<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%work_types}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%type_services}}`
 *
 * yii migrate/create create_work_types_table --fields=name:string:notNull,id_service_type:integer:foreignKey(type_services)
 */
class m190510_102422_create_work_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'id_service_type' => $this->integer(),
        ]);

        // creates index for column `id_service_type`
        $this->createIndex(
            '{{%idx-work_types-id_service_type}}',
            '{{%work_types}}',
            'id_service_type'
        );

        // add foreign key for table `{{%type_services}}`
        $this->addForeignKey(
            '{{%fk-work_types-id_service_type}}',
            '{{%work_types}}',
            'id_service_type',
            '{{%type_services}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%type_services}}`
        $this->dropForeignKey(
            '{{%fk-work_types-id_service_type}}',
            '{{%work_types}}'
        );

        // drops index for column `id_service_type`
        $this->dropIndex(
            '{{%idx-work_types-id_service_type}}',
            '{{%work_types}}'
        );

        $this->dropTable('{{%work_types}}');
    }
}
