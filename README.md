yii2-avatar
===========
yii2-avatar

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xinyeweb/yii2-avatar "dev-master"
```

or add

```
"xinyeweb/yii2-avatar": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
//在当前控制器的actions中添加如下配置
public function actions()
{
    return [
        'crop'=>[
            'class' => 'daimakuai\avatar\CropAction',
            'config'=>[
                'bigImageWidth' => '200',     //大图默认宽度
                'bigImageHeight' => '200',    //大图默认高度
                'middleImageWidth'=> '100',   //中图默认宽度
                'middleImageHeight'=> '100',  //中图图默认高度
                'smallImageWidth' => '50',    //小图默认宽度
                'smallImageHeight' => '50',   //小图默认高度
                
                //头像上传目录（注：目录前不能加"/"）
                'uploadPath' => 'uploads/avatar',
            ]
        ]
    ]; 
    
}

//调用方式,imageUrl为默认图地址
<?= \xinyeweb\avatar\AvatarWidget::widget(['imageUrl'=>'/statics/images/avatar/avatar.jpg']); ?>
```

```php
在form表单中使用
<?= $form->field($model, 'avatar')->widget(\xinyeweb\avatar\AvatarViewWidget::className()) ?>
在form的界面添加上传组件
<?php $obj = new \xinyeweb\avatar\AvatarUploadWidget(['imageUrl'=>'/statics/images/avatar/avatar.jpg']);echo $obj->setFooter(); ?>
```