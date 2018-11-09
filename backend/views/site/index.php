<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Register';
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
$arrKelamin = [
  ['id'=>'0','kelamin'=>'Laki-Laki'],
  ['id'=>'1','kelamin'=>'Perempuan'],
];
?>
<div class="row">
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card card-signup">
            <h2 class="card-title text-center">Register</h2>
            <div class="card-body">
                <div class="row">
                        <div class="col-md-5 ml-auto desktop-view" style="margin-top:10%;">
                            <div id="demo" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?= Yii::$app->request->baseUrl?>/img/cafe-icon.png">
                                        <div class="carousel-caption">
                                            <h3>Transaksi Digital</h3>
                                            <p>Membantu kamu bertransaksi dengan cepat dengan berbasis teknologi</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= Yii::$app->request->baseUrl?>/img/paperless.png">
                                        <div class="carousel-caption">
                                            <h3>Paperless</h3>
                                            <p>Meminimalisir penggunaan kertas yang mengakibatkan kesalahan
                                                pemesanan
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= Yii::$app->request->baseUrl?>/img/antrian.png">
                                        <div class="carousel-caption">
                                            <h3>Antrian</h3>
                                            <p>Mengurangi antrian yang menumpuk ketika ramai pelanggan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-5 mr-auto">
                        <?php
                          if($pesan['status']==1){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?=$pesan['pesan']?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php
                          }else if($pesan['status']==0){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?=$pesan['pesan']?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php } ?>
                        <?= Html::beginForm(['site/index'],'post') ?>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('text', $model, 'nama', ['class' => 'form-control','placeholder'=>'Nama ...']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">wc</i>
                                        </span>
                                    </div>
                                    <?= Html::activeDropDownList($model, 'jenis_kelamin', ArrayHelper::map($arrKelamin, 'id', 'kelamin'),['class' => 'form-control','style'=>'position:relative']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">phone</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('text', $model, 'telp', ['class' => 'form-control','placeholder'=>'No.Handphone...']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">location_on</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('text', $model, 'kota', ['class' => 'form-control','placeholder'=>'Kota...']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('number', $model, 'saldo', ['class' => 'form-control','placeholder'=>'Saldo...']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">account_circle</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('text', $model, 'username', ['class' => 'form-control','placeholder'=>'Username...']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('password', $model, 'password', ['class' => 'form-control','placeholder'=>'Password...']) ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-round mt-4" value="Submit" />
                            </div>
                        <?= Html::endForm() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
