<?php
namespace lulubin\redactor\actions;

use yii\base\Action;
use lulubin\redactor\models\FileUploadModel;

class FileUploadAction extends Action
{
    function run()
    {
        if (isset($_FILES)) {
            $model = new FileUploadModel();
            if ($model->upload()) {
                return $model->getResponse();
            } else {
                return ['error' => 'Unable to save file'];
            }
        }
    }
}