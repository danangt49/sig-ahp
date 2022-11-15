@extends('layouts.web.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Peta</h3>
          </div>
          <div class="card-body">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
  <style type="text/css">
    #map {
      height: 400px;
    }
  </style>
@stop

@section('js')
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script>
    let map;
    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: new google.maps.LatLng(-4.864842, 135.5651128),
        mapTypeId: "terrain",
      });

      const script = document.createElement("script");

      script.src =
        "http://127.0.0.1:8000/api/v1/perguruan-tinggi.geojsonp";
      document.getElementsByTagName("head")[0].appendChild(script);
    }

    const eqfeed_callback = function (results) {
      for (let i = 0; i < results.features.length; i++) {
        const coords = results.features[i].geometry.coordinates;
        const latLng = new google.maps.LatLng(coords[1], coords[0]);

        new google.maps.Marker({
          position: latLng,
          map: map,
        });
      }
    };

    window.initMap = initMap;
    window.eqfeed_callback = eqfeed_callback;
  </script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyALy8kNXdKdojWhtL7m0AbcfssKeG0p6Kw&callback=initMap" ></script>
@stop