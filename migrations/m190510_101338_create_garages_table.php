<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%garages}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%vehicles}}`
 *
 * yii migrate/create create_garages_table --fields=name:string:notNull,id_vehicle:integer:foreignKey(vehicles)
 */
class m190510_101338_create_garages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%garages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'id_vehicle' => $this->integer(),
        ]);

        // creates index for column `id_vehicle`
        $this->createIndex(
            '{{%idx-garages-id_vehicle}}',
            '{{%garages}}',
            'id_vehicle'
        );

        // add foreign key for table `{{%vehicles}}`
        $this->addForeignKey(
            '{{%fk-garages-id_vehicle}}',
            '{{%garages}}',
            'id_vehicle',
            '{{%vehicles}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%vehicles}}`
        $this->dropForeignKey(
            '{{%fk-garages-id_vehicle}}',
            '{{%garages}}'
        );

        // drops index for column `id_vehicle`
        $this->dropIndex(
            '{{%idx-garages-id_vehicle}}',
            '{{%garages}}'
        );

        $this->dropTable('{{%garages}}');
    }
}
