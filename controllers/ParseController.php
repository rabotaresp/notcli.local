<?php
namespace app\controllers;
//use Yii;
use yii\web\Controller;
use darkdrim\simplehtmldom\SimpleHTMLDom;
//class ParseController extends Controller
//{
//    public function actionParse()
//    {
//////        $str = file_get_contents('https://trotuarnayaplitka.by');
////        $data = SimpleHTMLDom::str_get_html('https://trotuarnayaplitka.by');
//////        $data = SimpleHTMLDom::file_curl_get_html('https://trotuarnayaplitka.by/');
////
////        $container = $data->find('.product-container')[0];
//////        echo $container->ounertext;
////
////        foreach ($container->find('.product-thumd') as $productThumb) {
////            $name = $productThumb->find('.product-head')[0]->innertext;
////            $a = 'https://trotuarnayaplitka.by' . $productThumb->find('a')[0]->href;
////            $product = SimpleHTMLDom::file_curl_get_html($a);
////            echo $a . '<br>';
////        }
////        exit();
//        $query = http_build_query([
////            'pattern'=> 'D1000'
////            'id' => 'searchResults'
//        ]);
//        $ch = curl_init('https://auto1.by');
////        curl_setopt($ch, CURLOPT_URL, 'https://auto1.by/Search');
////        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $str = curl_exec($ch);
//        curl_close($ch);
//        echo $str;
//        exit();
//    }
//}
class ParseController extends Controller
{
    /**
     * @qmode:2 поиск по описанию
     * @qmode:13 поиск по номеру код/ое-номер/аналог
     * @quantity кол-во на складе
     */
    public function actionParsem()
    {
//        function unicode_escape_decode($str) {
//            return html_entity_decode(
//                preg_replace('~\\\u([a-zA-Z0-9]{4})~', '&#x$1;', $str), null, 'UTF-8'
//            );
//        }
//        unicode_escape_decode();
        $query = "глушитель";
        $url = 'http://motexc.by/serv/php/router.php';
        $data = '{"action":"QueryDatabase","method":"getArticles",
        "data":{"smode":0,"typ_id":0,"qmode":2,"query":"'.$query.'",
        "hide_ext_stores":true,"sp_id":0,"region_id":0,"total":0,
        "user_id":null,"page":1,"start":0,"limit":1000},"type":"rpc","tid":1}';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
//        echo '<pre>';
//        print_r(json_decode($response));
        $data_json = json_decode($response);
        foreach ($data_json->result->articles as $item) {
            echo $item->description.' '.$item->price*2.34.'<br>';
//            echo $item->price*2.35.'<br>';

        }
        curl_close($ch);
        exit();
//        $ch = curl_init("http://motexc.by/serv/php/router.php");
//        curl_setopt($ch, CURLOPT_POSTFIELDS, );
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $str = curl_exec($ch);
//        curl_close($ch);
//        $str = file_get_contents("https://trotuarnayaplitka.by/cena");
//        $data = SimpleHTMLDom::str_get_html($str);
//        $container = $data->find('.product-container')[0];
////        echo $container->outertext;
//        foreach ($container->find('.product-thumb') as $productThumb) {
//            $name = $productThumb->find('.product-head')[0]->innertext;
//            $price = $productThumb->find('.btn-primary')[0]->innertext;
//            $a = 'https://trotuarnayaplitka.by'.$productThumb->find('a')[0]->href; //конкантинация ссылки к url запроса
//            $product = SimpleHTMLDom::file_curl_get_html($a);
//            echo $name.' '.$price.' '. $a.'<br>'; // объект по ссылке $a. Далее его можно разложить как $str в $data $data = SimpleHTMLDom::str_get_html($product);
//        }
//        exit();
    }
}
