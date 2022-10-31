@extends('layouts.web.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <p>Selamat Datang Di Website Sistem Informasi Geografis Kota Sorong</p>
                  <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
@stop

@section('js')
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJzz0v-GJBK7yl9d5EKBnQ-a7wLJcqVY&callback=initMap"></script>

  <script type="text/javascript">
      function initMap() {
        const myLatLng = { lat: 22.2734719, lng: 70.7512559 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 5,
          center: myLatLng,
        });

        new google.maps.Marker({
          position: myLatLng,
          map,
        });
      }

      window.initMap = initMap;
  </script>
{{--  <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAlJzz0v-GJBK7yl9d5EKBnQ-a7wLJcqVY&callback=initMap" ></script>  --}}
@stop