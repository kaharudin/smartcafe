<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu_category".
 *
 * @property int $idmenu_category
 * @property string $name
 * @property int $is_food
 *
 * @property Menu[] $menus
 */
class MenuCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'is_food'], 'required'],
            [['is_food'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmenu_category' => 'Idmenu Category',
            'name' => 'Name',
            'is_food' => 'Is Food',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['menu_category_idmenu_category' => 'idmenu_category']);
    }
}
