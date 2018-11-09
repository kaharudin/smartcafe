<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

// $this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
      <?= Html::beginForm(['site/login'],'post') ?>
          <div class="card card-login">
              <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Penjual - Login</h4>
              </div>
              <div class="card-body ">
                  <?= Alert::widget() ?>
                  <p class="card-description text-center">Welcome Back</p>
                  <span class="bmd-form-group">
                      <div class="input-group margin10">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="material-icons">face</i>
                              </span>
                          </div>
                          <?= Html::activeInput('text', $model, 'username', ['class' => 'form-control','placeholder'=>'Username...']) ?>
                      </div>
                  </span>
                  <span class="bmd-form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="material-icons">lock_outline</i>
                              </span>
                          </div>
                          <?= Html::activeInput('password', $model, 'password', ['class' => 'form-control','placeholder'=>'Password...']) ?>
                      </div>
                  </span>
              </div>
              <div class="card-footer justify-content-center">
                  <input type="submit" class="btn btn-rose btn-link btn-lg" value="Lets Go" />
              </div>
          </div>
      <?= Html::endForm() ?>
  </div>
</div>
