<?php


use yii\grid\GridView;
use yii\data\ActiveDataProvider;

echo "<br />";

$dataProvider = new ActiveDataProvider([
    'query' => \app\models\Users::find(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [

        'id',
        'name',
        'email'
]]);