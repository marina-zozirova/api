<?php

namespace app\controllers;

use app\models\Test;
use Yii;
use yii\httpclient\Client;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $search = new Test();
        if (Yii::$app->request->isAjax) {
            $info = Yii::$app->request->post('txt');

            $model = Test::find()->where(['info' => $info])->all();


            //return var_dump($model);
            if (!empty($model)) {
                return $this->renderAjax('card', compact('model'));
            } else {
                $client = new
                Client();
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl('https://api.github.com/search/repositories')
                    ->setData(['q' => $info])
                    ->addHeaders(['user-agent' => '2vfgdgdfgdf'])
                    ->send();

                foreach ($response->data['items'] as $item) {
                    $model = new Test();
                    $model->info = $info;
                    $model->name = $item['name'];
                    $model->author = $item['owner']['login'];
                    $model->stargazers = $item['stargazers_count'];
                    $model->watchers = $item['watchers_count'];
                    $model->save();
                }
                return var_dump($response->data['items']);
            }

        }
        return $this->render('index', compact('search'));
    }
}