<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $idorder
 * @property string $order_time
 * @property int $total_price
 * @property int $status
 * @property int $meja_idmeja
 *
 * @property Meja $mejaIdmeja
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_time', 'total_price', 'status', 'meja_idmeja'], 'required'],
            [['order_time'], 'safe'],
            [['total_price', 'status', 'meja_idmeja'], 'integer'],
            [['meja_idmeja'], 'exist', 'skipOnError' => true, 'targetClass' => Meja::className(), 'targetAttribute' => ['meja_idmeja' => 'idmeja']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idorder' => 'Idorder',
            'order_time' => 'Order Time',
            'total_price' => 'Total Price',
            'status' => 'Status',
            'meja_idmeja' => 'Meja Idmeja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMejaIdmeja()
    {
        return $this->hasOne(Meja::className(), ['idmeja' => 'meja_idmeja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_idorder' => 'idorder']);
    }
}
