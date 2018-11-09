<?php
/* @var $this yii\web\View */
$this->title = 'Topup';
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card card-signup">
            <h2 class="card-title text-center">TopUp</h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-rose">
                                <i class="material-icons">check_circle_outline</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Verifikasi</h4>
                                <p class="description">
                                    Periksa kembali topup anda, apakah sudah sesuai atau belum
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="material-icons">lock</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">PIN Transaksi</h4>
                                <p class="description">
                                    Jaga kerahasiaan PIN Transaksi dari customer
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-info">
                                <i class="material-icons">mood</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Ucapkan terima kasih</h4>
                                <p class="description">
                                    Jangan lupa selalu tersenyum dan ucapkan terima kasih
                                </p>
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
                        <?= Html::beginForm(['site/topup'],'post') ?>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">account_circle</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('text', $model, 'username', ['class' => 'form-control','placeholder'=>'Username ...']) ?>
                                </div>
                            </div>
                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('number', $model, 'nominal', ['class' => 'form-control','placeholder'=>'Nominal ...']) ?>
                                </div>
                            </div>

                            <div class="form-group has-default bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock</i>
                                        </span>
                                    </div>
                                    <?= Html::activeInput('password', $model, 'pin', ['class' => 'form-control','placeholder'=>'PIN Transaksi ...']) ?>
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
