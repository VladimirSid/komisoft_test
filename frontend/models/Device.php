<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "device".
 *
 * @property string $serial_number Серийный номер
 * @property string $store_name Название склада
 * @property string $create_at Дата создания
 *
 * @property Store $storeName
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at'],
                    //ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial_number'], 'required'],
            [['create_at'], 'safe'],
            ['store_name', 'default', 'value' => null],
            [['serial_number', 'store_name'], 'string', 'max' => 100],
            [['serial_number'], 'unique'],
            [['store_name'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serial_number' => 'Серийный номер',
            'store_name' => 'Название склада',
            'create_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreName()
    {
        return $this->hasOne(Store::className(), ['name' => 'store_name']);
    }
}
