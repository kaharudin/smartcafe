<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $idmenu
 * @property string $name
 * @property string $detail
 * @property string $gambar
 * @property int $price
 * @property int $status
 * @property int $menu_category_idmenu_category
 * @property int $penjual_idpenjual
 *
 * @property MenuCategory $menuCategoryIdmenuCategory
 * @property Penjual $penjualIdpenjual
 * @property OrderItem[] $orderItems
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'status', 'menu_category_idmenu_category', 'penjual_idpenjual'], 'required'],
            [['price', 'status', 'menu_category_idmenu_category', 'penjual_idpenjual'], 'integer'],
            [['name', 'detail'], 'string', 'max' => 45],
            [['gambar'], 'string', 'max' => 255],
            [['menu_category_idmenu_category'], 'exist', 'skipOnError' => true, 'targetClass' => MenuCategory::className(), 'targetAttribute' => ['menu_category_idmenu_category' => 'idmenu_category']],
            [['penjual_idpenjual'], 'exist', 'skipOnError' => true, 'targetClass' => Penjual::className(), 'targetAttribute' => ['penjual_idpenjual' => 'idpenjual']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmenu' => 'Idmenu',
            'name' => 'Name',
            'detail' => 'Detail',
            'gambar' => 'Gambar',
            'price' => 'Price',
            'status' => 'Status',
            'menu_category_idmenu_category' => 'Menu Category Idmenu Category',
            'penjual_idpenjual' => 'Penjual Idpenjual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuCategoryIdmenuCategory()
    {
        return $this->hasOne(MenuCategory::className(), ['idmenu_category' => 'menu_category_idmenu_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualIdpenjual()
    {
        return $this->hasOne(Penjual::className(), ['idpenjual' => 'penjual_idpenjual']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['menu_idmenu' => 'idmenu']);
    }
}
