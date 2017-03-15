<?php
namespace  console\controllers;

use yii\console\Controller;
use common\models\Post;

class HelloController extends Controller
{
    public function actionIndex()
    {
        echo "hello world! \n";
    }

    public function actionList()
    {
        $posts = Post::find()->all();
        foreach ($posts as $post) {
            echo ($post['id'] . ' - ' . $post['title'] . "\n");
        }
    }
}
