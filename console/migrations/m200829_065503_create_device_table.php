<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m200829_065503_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('device', [
            'serial_number' => $this->string(100)->notNull()->comment('Серийный номер'),
            'store_name' => $this->string(100)->null()->comment('Название склада'),
            'create_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
                ->comment('Дата создания'),
        ]);
        $this->addPrimaryKey('device_pk', 'device', 'serial_number');
        $this->createIndex('IDX_store', 'device','store_name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('device');
    }
}
