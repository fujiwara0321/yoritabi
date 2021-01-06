<?php

// header('Content-Type:application/json;charset=UTF-8');

//http://click.ecc.ac.jp/ecc/sakakura/ajax/selecter-list.php

// cUrlを使ったサーバーサイドの通信

// print_r($_GET);

// 通信先のURL
// $url = 'https://map.yahooapis.jp/search/local/V1/localSearch?appid=dj00aiZpPU92Z3VjSDBEQTV4dCZzPWNvbnN1bWVyc2VjcmV0Jng9MzQ-&lat='+$_GET["ido"]+'&lon='+ $_GET["keido"]+ 'dist=2';

$url = 'https://map.yahooapis.jp/search/local/V1/localSearch?appid=dj00aiZpPU92Z3VjSDBEQTV4dCZzPWNvbnN1bWVyc2VjcmV0Jng9MzQ-&lat=34.698699&lon=135.491591&dist=2&results=10&output=json';

// print $url;


// cUrlの初期化
// curl_init( url ) urlは省略可能

$curlHandler = curl_init();

// cUrlに通信オプションを設定
// curl_setopt_array( curlのハンドラー,配列 )
// オプションの定数は公式サイトを参照 

curl_setopt_array(
  $curlHandler,
  [
    // 通信先
    CURLOPT_URL => $url,
    // curl_exec( curlハンドラー )
    // falseが出力する
    CURLOPT_RETURNTRANSFER => true
    // falseだと1が出てしまう
  ]
  );

  // cUrlで通信を実行
  // curl_exec( cUrlハンドラー )
  // 通信に成功した場合は、結果を返します
  $response = curl_exec( $curlHandler );

  // cUrlの通信を閉じる
  // curl_close( cUrlハンドラー )
  curl_close( $curlHandler );

// requestがjson/jsonpで出力結果を変更する
// print $response;
// CURLOPT_RETURNTRANSFERをfalseにしてたら1が表示される

//  GET : callback jsonpで返す。

// jsonpに変換して表示
// print filter_input(INPUT_GET, "callback") . "(" . $response . ")";
// $callback = filter_input(INPUT_GET, "callback");
// print "{ $callback }({ $response })";

if( isset( $_GET[ "callback" ] ) ){
  // jsonpに変換して表示
  // print filter_input( INPUT_GET, "callback" ) . "(" . $response . ")";
  $callback = filter_input( INPUT_GET, "callback" );
  // $response = str_replace('getGeo', $callback, $response);
  print $callback . "({$response})";
  // 関数として渡す(jsonpの場合)
}
else{
  // jsonで表示
  print $response;
}