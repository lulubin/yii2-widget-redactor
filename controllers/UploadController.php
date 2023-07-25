<?php
namespace lulubin\redactor\controllers;

use yii\web\Response;

class UploadController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
            'file' => 'lulubin\redactor\actions\FileUploadAction',
            'image' => 'lulubin\redactor\actions\ImageUploadAction',
            'image-json' => 'lulubin\redactor\actions\ImageManagerJsonAction',
            'file-json' => 'lulubin\redactor\actions\FileManagerJsonAction',
        ];
    }
}