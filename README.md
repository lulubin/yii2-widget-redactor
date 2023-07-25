## 1.Install
composer require --prefer-dist lulubin/yii2-widget-redactor "dev-master"

## 2.Usage
2.1 配置 php fileinfo 扩展
```
打开php.ini文件去掉fileinfo前面的分号即可
```
2.2 配置 modules
```php
'modules' => [
    //使用默认配置，必须先创建 uploads 文件夹
    'redactor' => 'lulubin\redactor\RedactorModule',
],
'modules' => [
    'redactor' => [
        'class' => 'lulubin\redactor\RedactorModule',
        //修改默认配置，必须先创建 uploads 文件夹
        'uploadDir' => '@webroot/uploads',
        'uploadUrl' => '@web/uploads',
        'imageAllowExtensions'=>['jpg','png','gif']
    ],
],
```
2.3 视图
```php
<?= lulubin\redactor\widgets\Redactor::widget(['name' => 'redactor']) ?>
<?= $form->field($model, 'redactor')->widget(lulubin\redactor\widgets\Redactor::className()) ?>
<?= $form->field($model, 'redactor')->widget(lulubin\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
    	//更多插件，请查看assets/plugins
        'plugins' => ['fontcolor','fontsize','fontfamily','fullscreen','imagemanager','table','textexpander']
    ]
])?>
```

2.4 自定义 RedactorModule
```
①、复制一份 vendor/lulubin/yii2-widget-RedactorModule.php 到 components 文件夹
②、修改 yii2-widget-RedactorModule.php 的命名空间 namespace app\components;
③、修改 modules 配置
	'modules' => [
	    'redactor' => 'app\components\RedactorModule',
	],
④、配置完后你就可以尽情修改 app\components\RedactorModule.php 文件了，比如你可以修改 文件上传的目录
	public function getOwnerPath()
	{
		//原来是三级目录，现在是一级目录了
	    return date('Y').date('m').date('d');
	}
```