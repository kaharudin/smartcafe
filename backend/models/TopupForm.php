<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\TopupHistory;

/**
 * Signup form
 */
class TopupForm extends Model
{
    public $username;
    public $nominal;
    public $pin;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min'=>3, 'max' => 45],

            ['nominal', 'trim'],
            ['nominal', 'required'],

            ['pin', 'trim'],
            ['pin', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function topup()
    {
        if (!$this->validate()) {
            return null;
        }
        // var_dump($this);
        if($this->pin == '123456'){
          $user = User::find()->where(['username'=>$this->username])->one();
          $user->saldo = $user->saldo + (int)$this->nominal;
          $user->save();
          $topup = new TopupHistory();
          $topup->nominal = (int)$this->nominal;
          $topup->topup_time = date('Y-m-d H:i:s');
          $topup->user_id = $user['iduser'];

          return $topup->save()? $user : null;
        }
        return null;
    }
}
