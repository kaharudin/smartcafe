<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "topup_history".
 *
 * @property int $idtopup_history
 * @property int $nominal
 * @property string $topup_time
 * @property int $user_id
 *
 * @property User $user
 */
class TopupHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'topup_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nominal', 'topup_time', 'user_id'], 'required'],
            [['nominal', 'user_id'], 'integer'],
            [['topup_time'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'iduser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtopup_history' => 'Idtopup History',
            'nominal' => 'Nominal',
            'topup_time' => 'Topup Time',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['iduser' => 'user_id']);
    }
}
