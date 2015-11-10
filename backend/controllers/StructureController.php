<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Structure;

/**
 * Site controller
 */
class StructureController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'edit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex(){
        $structure_items = Structure::find()->all();

        return $this->render('index', [
            'structure_items' => $structure_items
        ]);
    }

    public function actionEdit(){
        $request = Yii::$app->request;
        $item_id = $request->get('item_id');

        $item_data = Structure::findOne($item_id);

        return $this->render('edit', [
            'item_data' => $item_data
        ]);
    }
}
