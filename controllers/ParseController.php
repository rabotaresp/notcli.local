<?php

namespace app\controllers;

use darkdrim\simplehtmldom\SimpleHTMLDom;
use Yii;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;
use app\models\ContactForm;

class ParseController extends Controller
{
    public function actionParse()
    {
//        $ch = curl_init("https://trotuarnayaplitka.by/cena");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $str = curl_exec($ch);
//
//        curl_close($ch);
        $str = file_get_contents("https://trotuarnayaplitka.by/cena");
        $data = SimpleHTMLDom::str_get_html($str);
        $container = $data->find('.product-container')[0];
//        echo $container->outertext;
        foreach ($container->find('.product-thumb') as $productThumb) {
            $name = $productThumb->find('.product-head')[0]->innertext;
            $price = $productThumb->find('.btn-primary')[0]->innertext;
            $a = 'https://trotuarnayaplitka.by'.$productThumb->find('a')[0]->href; //конкантинация ссылки к url запроса
            $product = SimpleHTMLDom::file_curl_get_html($a);

            echo $name.' '.$price.' '. $a.'<br>'; // объект по ссылке $a. Далее его можно разложить как $str в $data $data = SimpleHTMLDom::str_get_html($product);

        }
        exit();
    }

}
