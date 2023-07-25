<?php
namespace lulubin\redactor;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use yii\helpers\Url;

class RedactorModule extends \yii\base\Module
{
    public $controllerNamespace = 'lulubin\redactor\controllers';
    public $defaultRoute = 'upload';
    public $uploadDir = '@webroot/uploads';
    public $uploadUrl = '@web/uploads';
    public $imageUploadRoute = ['/redactor/upload/image'];
    public $fileUploadRoute = ['/redactor/upload/file'];
    public $imageManagerJsonRoute = ['/redactor/upload/image-json'];
    public $fileManagerJsonRoute = ['/redactor/upload/file-json'];
    public $imageAllowExtensions = ['jpg', 'png', 'gif', 'bmp', 'svg'];
    public $fileAllowExtensions = null;
    public $widgetOptions=[];
    public $widgetClientOptions=[];
    
    public function getFilePath($fileName)
    {
        return $this->getSaveDir() . DIRECTORY_SEPARATOR . $fileName;
    }

    public function getSaveDir()
    {
        $path = Yii::getAlias($this->uploadDir) . DIRECTORY_SEPARATOR . $this->getOwnerPath();    
        if(!file_exists($path)){      
            if (!FileHelper::createDirectory($path, 0775,$recursive = true )) {
                throw new InvalidConfigException('$uploadDir does not exist and default path creation failed');
            }
        }
        return $path;
    }

    public function getUrl($fileName)
    {
        return Url::to($this->uploadUrl . '/' . $this->getOwnerPath() . '/' . $fileName);
    }
    
    public function getOwnerPath()
    {
        return date('Y').'/'.date('m').'/'.date('d');
    }
}