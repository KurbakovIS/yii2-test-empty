<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user_types}}`
 * - `{{%city}}`
 * - `{{%vip_cards}}`
 */
class m190511_143502_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
            'username' => $this->string(32)->notNull()->unique(),
            'id_type' => $this->integer(),
            'surname' => $this->string(32)->notNull(),
            'name' => $this->string(32)->notNull(),
            'middlename' => $this->string(32),
            'birthday' => $this->integer()->notNull(),
            'email' => $this->string(128)->notNull()->unique(),
            'telegram_name' => $this->string(55),
            'telephone' => $this->string(10)->unique()->notNull(),
            'id_city' => $this->integer()->notNull(),
            'id_vip_card' => $this->integer(),
        ]);

        // creates index for column `id_type`
        $this->createIndex(
            '{{%idx-users-id_type}}',
            '{{%users}}',
            'id_type'
        );

        // add foreign key for table `{{%user_types}}`
        $this->addForeignKey(
            '{{%fk-users-id_type}}',
            '{{%users}}',
            'id_type',
            '{{%user_types}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_city`
        $this->createIndex(
            '{{%idx-users-id_city}}',
            '{{%users}}',
            'id_city'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-users-id_city}}',
            '{{%users}}',
            'id_city',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_vip_card`
        $this->createIndex(
            '{{%idx-users-id_vip_card}}',
            '{{%users}}',
            'id_vip_card'
        );

        // add foreign key for table `{{%vip_cards}}`
        $this->addForeignKey(
            '{{%fk-users-id_vip_card}}',
            '{{%users}}',
            'id_vip_card',
            '{{%vip_cards}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user_types}}`
        $this->dropForeignKey(
            '{{%fk-users-id_type}}',
            '{{%users}}'
        );

        // drops index for column `id_type`
        $this->dropIndex(
            '{{%idx-users-id_type}}',
            '{{%users}}'
        );

        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-users-id_city}}',
            '{{%users}}'
        );

        // drops index for column `id_city`
        $this->dropIndex(
            '{{%idx-users-id_city}}',
            '{{%users}}'
        );

        // drops foreign key for table `{{%vip_cards}}`
        $this->dropForeignKey(
            '{{%fk-users-id_vip_card}}',
            '{{%users}}'
        );

        // drops index for column `id_vip_card`
        $this->dropIndex(
            '{{%idx-users-id_vip_card}}',
            '{{%users}}'
        );

        $this->dropTable('{{%users}}');
    }
}
