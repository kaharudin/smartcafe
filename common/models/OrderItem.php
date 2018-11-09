<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $idorder_item
 * @property int $qty
 * @property int $order_idorder
 * @property int $menu_idmenu
 * @property int $status
 *
 * @property Menu $menuIdmenu
 * @property Order $orderIdorder
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qty', 'order_idorder', 'menu_idmenu', 'status'], 'integer'],
            [['order_idorder', 'menu_idmenu', 'status'], 'required'],
            [['menu_idmenu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_idmenu' => 'idmenu']],
            [['order_idorder'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_idorder' => 'idorder']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idorder_item' => 'Idorder Item',
            'qty' => 'Qty',
            'order_idorder' => 'Order Idorder',
            'menu_idmenu' => 'Menu Idmenu',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuIdmenu()
    {
        return $this->hasOne(Menu::className(), ['idmenu' => 'menu_idmenu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIdorder()
    {
        return $this->hasOne(Order::className(), ['idorder' => 'order_idorder']);
    }
}
