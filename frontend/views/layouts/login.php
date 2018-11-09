<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="icon" type="image/png" href="<?= Yii::$app->request->baseUrl?>/img/favicon-icon.png">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Penjual - Login</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper wrapper-full-page">

    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('<?= Yii::$app->request->baseUrl?>/img/bg.jpg')">
        <div class="container" style="padding-top:0;">
            <?=$content?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>

<script>
    $(document).ready(function () {
        demo.checkFullPageBackgroundImage();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
