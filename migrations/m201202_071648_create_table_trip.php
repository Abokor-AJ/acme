<?php

use yii\db\Migration;

/**
 * Class m201202_071648_create_table_trip
 */
class m201202_071648_create_table_trip extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(){

      $this->createTable('trip', [
        'id' => $this->primaryKey()->unsigned(),
        'user_id' => $this->integer()->unsigned()->notNull(),
        'from' => $this->integer()->unsigned()->notNull(),
        'to' => $this->integer()->unsigned()->notNull(),
        'date' => $this->dateTime()->notNull(),
        'number_seats' => $this->integer()->notNull(),
        'duration' => $this->decimal(10, 1)->notNull(),
        'price' => $this->decimal(10, 2)->notNull(),
        'currency_id' => $this->integer()->unsigned()->notNull(),
        'status' => $this->integer(4)->notNull()->defaultValue(1),
        'updated' => $this->timestamp()->notNull(),
        'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
      ]);

      $this->createIndex('idx_trip_user_id_user', 'trip', 'user_id');
      $this->addForeignKey('FK_trip_user_id_user', 'trip', 'user_id', 'user', 'id', 'restrict', 'cascade');

      $this->createIndex('idx_trip_from_place', 'trip', 'from');
      $this->addForeignKey('FK_trip_from_place', 'trip', 'from', 'place', 'id', 'restrict', 'cascade');

      $this->createIndex('idx_trip_to_place', 'trip', 'to');
      $this->addForeignKey('FK_trip_to_place', 'trip', 'to', 'place', 'id', 'restrict', 'cascade');

      $this->createIndex('idx_trip_currency_id_currency', 'trip', 'currency_id');
      $this->addForeignKey('FK_trip_currency_id_currency', 'trip', 'currency_id', 'currency', 'id', 'restrict', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(){
      $this->dropForeignKey('FK_trip_user_id_user', 'trip');
      $this->dropIndex('idx_trip_user_id_user', 'trip');

      $this->dropForeignKey('FK_trip_from_place', 'trip');
      $this->dropIndex('idx_trip_from_place', 'trip');

      $this->dropForeignKey('FK_trip_to_place', 'trip');
      $this->dropIndex('idx_trip_to_place', 'trip');

      $this->dropForeignKey('FK_trip_currency_id_currency', 'trip');
      $this->dropIndex('idx_trip_currency_id_currency', 'trip');

      $this->dropTable('trip');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201202_071648_create_table_trip cannot be reverted.\n";

        return false;
    }
    */
}
