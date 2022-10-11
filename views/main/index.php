<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();

echo $form->field($search, 'info')->textInput(['class' => 'txt']);
echo Html::button('Поиск', ['class' => 'btn btn-primary']);
?>
<div class="card">

</div>

<?php
$js=
<<<JS

$('.btn-primary').click(function() {
    let txt = $('.txt')[0].value
    
    $.ajax({
        url: '/main/index',
        type: 'POST',
        dataType: 'json',
        data: {'txt':txt},
    })

$(".mydiv").load();


})


JS;
$this->registerJs($js);

ActiveForm::end();
