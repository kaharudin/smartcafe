<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "non_member".
 *
 * @property int $idnon_member
 * @property string $username
 * @property string $no_hp
 */
class NonMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'non_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'no_hp'], 'required'],
            [['username'], 'string', 'max' => 45],
            [['no_hp'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnon_member' => 'Idnon Member',
            'username' => 'Username',
            'no_hp' => 'No Hp',
        ];
    }
}
