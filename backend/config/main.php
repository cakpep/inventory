<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name'=>'App Development',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['mimin']
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',   
            // 'layout' => 'right-menu', // default null. other avaliable value 'right-menu' and 'top-menu'
                    /*'menus' => [
                        'assignment' => [
                            'label' => 'Grand Access' // change label
                        ],
                        'route' => null, // disable menu
                    ],      */
        ],
    ],
    'components' => [
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        // ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',//'yii\rbac\PhpManager', // or use 
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
