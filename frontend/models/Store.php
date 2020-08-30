<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property string $name Название
 * @property string $create_at Дата создания
 *
 * @property Device[] $devices
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['create_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'create_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::className(), ['store_name' => 'name']);
    }
}
