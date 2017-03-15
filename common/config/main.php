<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'my_app',
        ],
        /*'cache' => [
            'class' => 'yii\caching\DbCache',
            'db' => 'dbname',
            'cacheTable' => 'tablename',
        ],*/
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//                ],
//            ],
//        ],
        'authManager' => [
            'class' =>'yii\rbac\DbManager',
        ],
    ],
];
