<?php

require_once('simple_html_dom.php');

// Забиваем массив исходных ссылок
$urls = [
    'http://hello-site.ru/blog/'
];

//помещаем каждую ссылку в функцию file_get_contents
$content = [];
foreach($urls as $item){
    $content[] = file_get_contents($item);
}

// Вывод контента
foreach($content as $item){
    // Получаем html'ину со встроенными стилями
    //echo $item;
}

// Create DOM from URL or file
//$html = file_get_html('http://www.postroika.ru/html/simplesitepri.html');

// Find all images
//foreach($html->find('font', 0) as $element)
//    echo $element->src . '<br />';

//// Find all links
//foreach($html->find('a') as $element)
//    echo $element->href . '<br>';

//$r = $html->find('p');

//print_r($r);

//echo $html;


//
//$html = new simple_html_dom();
//$html->load($content[0]);
//
//$collection = $html->find('a');
//
//foreach($collection as $collectionItem) {
//    $articles[] = $collectionItem->attr;   //массив всех атрибутов, href в том числе
//}
//
//foreach($articles as $articlesItem){
//    $hrefText[] = $articlesItem['href'];	//собираем в массив значения подмассива с ключом href
//}
//
//foreach($hrefText as $hrefTextItem){	//избавляемся от ссылок с пустым атрибутом href
//    if($hrefTextItem!=''){
//        $clearHrefs[]=$hrefTextItem;
//    }
//}
//
//$clearHrefs = array_unique($clearHrefs);	//избавляемся от одинаковых ссылок
//
//print_r($clearHrefs);	// в итоге у нас массив со всем ссылками с 3х страниц


$dom = new DOMDocument;	//создаем объект

$dom->loadHTML($content[0]);	//загружаем контент

$node = $dom->getElementsByTagName('meta');   //берем все теги a

for ($i = 0; $i < $node->length; $i++) {
    $hrefText[] = $node->item($i)->getAttribute('property');	//вытаскиваем из тега атрибут href
}

foreach($hrefText as $hrefTextItem) {	//избавляемся от ссылок с пустым атрибутом href
    if($hrefTextItem!=''){
        $clearHrefs[]=$hrefTextItem;
    }
}

$clearHrefs = array_unique($clearHrefs);	//избавляемся от одинаковых ссылок

print_r($clearHrefs);	// в итоге у нас массив со всем ссылками с 3х страниц