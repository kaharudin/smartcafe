<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $iduser
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $kota
 * @property int $jenis_kelamin
 * @property string $telp
 * @property int $saldo
 *
 * @property TopupHistory[] $topupHistories
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama', 'kota', 'jenis_kelamin', 'telp', 'saldo'], 'required'],
            [['jenis_kelamin', 'saldo'], 'integer'],
            [['username', 'password', 'nama', 'kota'], 'string', 'max' => 45],
            [['telp'], 'string', 'max' => 13],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iduser' => 'Iduser',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'kota' => 'Kota',
            'jenis_kelamin' => 'Jenis Kelamin',
            'telp' => 'Telp',
            'saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopupHistories()
    {
        return $this->hasMany(TopupHistory::className(), ['user_id' => 'iduser']);
    }
}
