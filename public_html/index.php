<?php

use Symfony\Component\HttpFoundation\Request; // Per le richieste HTTP

$app = require __DIR__.'/bootstrap.php';


$app->get('/exchange/{valuta}', function (Request $request,$valuta) use ($app) {
  $XML=simplexml_load_file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
  //the file is updated daily between 2.15 p.m. and 3.00 p.m. CET
  $cambioValuta = array();
  foreach($XML->Cube->Cube->Cube as $rate){
     $cambioValuta[] = array(
         'currency' => (string)$rate["currency"],
         'rate' => (string)$rate["rate"]
     );
  }
  if($valuta == null){
    // Restituisco json intero
    $return = $cambioValuta;
  }else{
    foreach($cambioValuta as $item){
      if($item["currency"] == $valuta)
        $return = array(array(
          'currency' => $item["currency"],
          'rate' => $item["rate"]
      ))
    }
  }
  return $app->json($return);
})
    ->method('GET|POST')
    ->bind('exchange')
    ->value('valuta', null);

$app->run();
