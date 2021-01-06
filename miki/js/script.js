$(function(){

  console.log(location.search);
  let getVal = location.search.split("?")[1].split("&");
  console.log(getVal);

  // 住所から緯度・経度を取得してくる関数
  // data => 住所
  function getGeo(geo){
    $.ajax({
      url: "http://localhost/e_girls/web/api-geo.php",
      method: "get",
      dataType: "json",
      data: geo,
      timeout: 3000
    })
    .done(function (data) {
      let geoData = data["Feature"][0]["Geometry"]["Coordinates"];
      let keido = geoData.split(",")[0];
      let ido = geoData.split(",")[1];
      console.log(keido);
      console.log(ido)
      
      getStation('34.698699', '135.491591');
    })
    .fail(function (error) {
      console.log(error)
    })
  }

  // 緯度・経度から最寄駅を取得してくる関数
  // 
  function getStation(ido,keido){
    $.ajax({
      url: "http://localhost/e_girls/web/api-station.php",
      method: "get",
      dataType: "json",
      data: {
        ido: ido,
        keido: keido
      },
      timeout: 3000
    })
    .done(function (data) {
      console.log(data)
    })
    .fail(function (error) {
      console.log(error)
    })
  }

  // 
  function getSpot(ido, keido) {
    $.ajax({
      url: "http://localhost/e_girls/web/api-spot.php",
      method: "get",
      dataType: "json",
      data: geo,
      timeout: 3000
    })
    .done(function (data) {
      let geoData = data["Feature"][0]["Geometry"]["Coordinates"];
      let keido = geoData.split(",")[0];
      let ido = geoData.split(",")[1];
      console.log(keido);
      console.log(ido);
      return "keido";
    })
    .fail(function (error) {
      console.log(error)
    })
  }


  // 緯度・経度から食事処を取得してくる関数
  // 
  function getEat(ido, keido) {
    $.ajax({
      url: "http://localhost/e_girls/web/api-eat.php",
      method: "get",
      dataType: "json",
      data: geo,
      timeout: 3000
    })
      .done(function (data) {
        let geoData = data["Feature"][0]["Geometry"]["Coordinates"];
        let keido = geoData.split(",")[0];
        let ido = geoData.split(",")[1];
        console.log(keido);
        console.log(ido)
      })
      .fail(function (error) {
        console.log(error)
      })
  }




  // 変数一覧
  let startPos = getVal[5].split("=")[1];
  let plan01text = getVal[8].split("=")[1];
  let plan01cate = getVal[9].split("=")[1];
  let plan02text = getVal[12].split("=")[1];
  let plan02cate = getVal[13].split("=")[1];
  let plan03text = getVal[16].split("=")[1];
  let plan03cate = getVal[17].split("=")[1];
  let plan04text = getVal[20].split("=")[1];
  let plan04cate = getVal[21].split("=")[1];
  let finishPos = getVal[24].split("=")[1];


  // 出発地点の緯度経度を取得
  getGeo(startPos);
  
  // 
  
  
})


  // 出発地点 => 住所指定 => 緯度経度取得


  // プラン１ => 荷物預け => 出発地点から一番近い駅

  // プラン２ => 観光地 => プラン１から一番近い観光スポット

  // プラン３ => ごはん => プラン２から一番近いごはん

  // プラン４ => お土産 => プラン３から一番近い駅

  // 到着地点 => 
