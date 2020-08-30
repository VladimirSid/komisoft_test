<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%store}}`.
 */
class m200829_094410_create_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('store', [
            'name' => $this->string(100)->notNull()->comment('Название'),
            'create_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
                ->comment('Дата создания'),
        ]);
        $this->addPrimaryKey('store_pk', 'store', 'name');

        // Добавляем foreign key для device
        $this->addForeignKey(
            'device_fk',  //  "условное имя" ключа
            'device',     // название текущей таблицы
            'store_name', //  имя поля в текущей таблице, которое будет ключом
            'store',     // имя таблицы, с которой хотим связаться
            'name',   // поле таблицы, с которым хотим связаться
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('store');
    }
}
