<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meja".
 *
 * @property int $idmeja
 * @property string $username
 * @property int $nomor
 * @property int $status
 *
 * @property Order[] $orders
 */
class Meja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomor', 'status'], 'required'],
            [['nomor', 'status'], 'integer'],
            [['username'], 'string', 'max' => 45],
            [['nomor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmeja' => 'Idmeja',
            'username' => 'Username',
            'nomor' => 'Nomor',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['meja_idmeja' => 'idmeja']);
    }
}
