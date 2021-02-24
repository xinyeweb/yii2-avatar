<?php


namespace xinyeweb\avatar;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class AvatarWidget extends InputWidget
{
    public $options = ['class' => 'form-control'];
    public $imageOptions = [];

    public $inForm = false;
    public $imageUrl = '';
    public $setTarget = '';
    public $model;
    public $type = 'hidden';
    public $attribute = [];
    public $attributes = [];

    public function run()
    {
        parent::init();
        $this->attributes['id'] = $this->options['id'];
        if ($this->hasModel()) {
            $input = Html::activeInput($this->type, $this->model, $this->attribute, $this->attributes);
        } else {
            $input = Html::input($this->type, $this->name, '', $this->attributes);
        }

        $this->registerClientScript();
        $model = new UploadForm();
        if($this->inForm){
            echo $input;
            return $this->render('view', ['model' => $model]);
        }else{
            return $this->render('index', ['model' => $model]);
        }
    }

    public function registerClientScript()
    {
        AvatarAsset::register($this->view);
        //$script = "FormFileUpload.init();";
        //$this->view->registerJs($script, View::POS_READY);
    }
}