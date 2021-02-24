<?php


namespace xinyeweb\avatar;


use yii\bootstrap\InputWidget;
use yii\helpers\Html;
use yii\web\View;

class AvatarViewWidget extends InputWidget
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
    public $view ;

    public function run()
    {
        parent::init();
        $this->view = $this->getView();
        $this->attributes['id'] = $this->options['id'];
        if ($this->hasModel()) {
            $input = Html::activeInput($this->type, $this->model, $this->attribute, $this->attributes);
        } else {
            $input = Html::input($this->type, $this->name, '', $this->attributes);
        }
        $this->registerClientScript();
        $model = new UploadForm();
        echo $input;
        return $this->render('view', ['model' => $model]);

    }

    public function registerClientScript()
    {
        AvatarAsset::register($this->view);
        $script = "var target_tip ='".$this->options['id']."';";
        $this->view->registerJs($script, View::POS_BEGIN);

        $script1 = "var def_pic2 = $('#'+target_tip).val();if(def_pic2!=\"\"){     $('#pre_avatar').attr('src',def_pic2);   }";
        $this->view->registerJs($script1, View::POS_READY);
    }

    public function setFooter()
    {
        $model = new UploadForm();
        return $this->render('upload', ['model' => $model]);
    }
}