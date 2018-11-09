<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $nama;
    public $kota;
    public $jenis_kelamin;
    public $telp;
    public $saldo;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username sudah digunakan.'],
            ['username', 'string', 'min'=>3, 'max' => 45],

            ['password', 'required'],
            ['password', 'string', 'min'=>3, 'max' => 45],


            ['nama', 'trim'],
            ['nama', 'required'],
            ['nama', 'string', 'min'=>3, 'max' => 255],

            ['kota', 'trim'],
            ['kota', 'required'],
            ['kota', 'string', 'min'=>3, 'max' => 45],

            ['jenis_kelamin', 'required'],

            ['telp', 'trim'],
            ['telp', 'required'],
            ['telp', 'string', 'max' => 13],

            ['saldo', 'trim'],
            ['saldo', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        // var_dump($this);

        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        $user->nama = $this->nama;
        $user->kota = $this->kota;
        $user->jenis_kelamin = $this->jenis_kelamin;
        $user->telp = $this->telp;
        $user->saldo = $this->saldo;

        return $user->save()? $user : null;
    }
}
