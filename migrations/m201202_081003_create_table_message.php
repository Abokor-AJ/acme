<?php

use yii\db\Migration;

/**
 * Class m201202_065528_create_table_message
 */
class m201202_081003_create_table_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(){
      $this->createTable('message', [
        'id' => $this->primaryKey()->unsigned(),
        'from_user_id' => $this->integer()->unsigned()->notNull(),
        'to_user_id' => $this->integer()->unsigned()->notNull(),
        'trip_id' => $this->integer()->unsigned()->notNull(),
        'text' => $this->text()->notNull(),
        'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
      ]);

      $this->createIndex('idx_message_from_user_id_user', 'message', 'from_user_id');
      $this->addForeignKey('FK_message_from_user_id_user', 'message', 'from_user_id', 'user', 'id', 'restrict', 'cascade');

      $this->createIndex('idx_message_to_user_id_user', 'message', 'to_user_id');
      $this->addForeignKey('FK_message_to_user_id_user', 'message', 'to_user_id', 'user', 'id', 'restrict', 'cascade');

      $this->createIndex('idx_message_trip_id_trip', 'message', 'trip_id');
      $this->addForeignKey('FK_message_trip_id_trip', 'message', 'trip_id', 'trip', 'id', 'restrict', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(){

      $this->dropForeignKey('FK_message_from_user_id_user', 'message');
      $this->dropIndex('idx_message_from_user_id_user', 'message');

      $this->dropForeignKey('FK_message_to_user_id_user', 'message');
      $this->dropIndex('idx_message_to_user_id_user', 'message');

      $this->dropForeignKey('FK_message_trip_id_trip', 'message');
      $this->dropIndex('idx_message_trip_id_trip', 'message');

      $this->dropTable('message');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201202_065528_create_table_message cannot be reverted.\n";

        return false;
    }
    */
}
