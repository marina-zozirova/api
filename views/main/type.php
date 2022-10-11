<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

$form = ActiveForm::begin();

echo $form->field($search, 'info')->textInput(['class' => 'txt']);
echo Html::button('Поиск', ['class' => 'btn btn-primary']);

$js=
<<<JS
$('.btn-primary').click(function() {
    $.ajax({
        url: '/main/index',
        type: 'POST',
        dataType: 'json',
        data: 'text',
    }),
    $.pjax.reload({container: '#pjaxContent'});
})


JS;
$this->registerJs($js);

ActiveForm::end();

