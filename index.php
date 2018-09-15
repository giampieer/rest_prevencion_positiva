<?php
session_start();
include 'simple_html_dom.php';

$op = $_REQUEST['op'];
switch ($op) {
  case 1:{
    $html = file_get_html('https://www.indeci.gob.pe/calendario.php');
    $tr = $html->find('li');

    foreach ($tr as $item) {
      $tremor = [];
      $a = $item->find("time", 0)->plaintext;
      //$h2 = $item->find("h2",1)->plaintext;
      $p = $item->find("p",0)->plaintext;
      //$tremor['h2'] = $h2;
      $tremor['p'] = $p;
      if ($a != "" || $a != null) {
        $tremor['place'] = $a;
        $tremors[] = $tremor;
      }
    }
    $estado['data'] = $tremors;
    print json_encode($estado);
  }break;
  case 2:{

  }break;
}
?>