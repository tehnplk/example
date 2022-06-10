<?php

use yii\widgets\ActiveForm;
?>
<div class="nhso-default-index">
    <h1>เชคสิทธิรักษา</h1>
    <?php
    $f = ActiveForm::begin();
    ?>
    <input id ="patient_cid" name="patient_cid" placeholder="เลขบัตรคนไข้"  required/>
    <button type="submit">Submit</button>

    <?php
    ActiveForm::end();
    ?>

</div>

<pre>
    <?php
    if (!empty($resp)) {
        echo "<pre>";
        print_r($resp);
        echo "</pre>";
    }
    ?>
</pre>
