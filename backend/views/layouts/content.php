<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\widgets\Pjax;

?>
<div class="content-wrapper">
    <?php Pjax::begin(['id' => 'cp-bckend-content']) ?>
        <section class="content-header">
            <h1>
                <?php
                if ($this->title !== null) {
                    echo $this->title;
                } else {
                    echo \yii\helpers\Inflector::camel2words(\yii\helpers\Inflector::id2camel($this->context->module->id));
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
            <div id="pjax-loader" style="display: none;"></div>
            <?=
            Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
            ) ?>
        </section>
        
        
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
    <?php Pjax::end() ?>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 All rights reserved.
</footer>