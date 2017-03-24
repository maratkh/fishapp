@extends('layouts.app')

@section('content')

    <form action="{{url('waters')}}" method="POST">
        {!! csrf_field() !!}
        <label for="text"> Название водоема</label>
        <input id="name" name="name" type="text">
        <select name="region">
            @foreach(\App\Models\Region::all() as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
            </select>

        <select name="watertype">
            @foreach(\App\Models\WaterType::all() as $watertype)
                <option value="{{$watertype->id}}">{{$watertype->name}}</option>
            @endforeach
        </select>

        <select name="fish[]"  multiple="multiple" multiple>
            @foreach(\App\Models\Fish::all() as $fish)
                <option value="{{$fish->id}}">{{$fish->name}}</option>
            @endforeach
        </select>


        <input type="hidden" name="location" id="location">
        <input type="submit" value="Сохранить"/>

    </form>


    <div id="map" style="height: 700px"></div>
    <script type="text/javascript">
        function initMap(){
            var mapOptions = {
                zoom: 10,
                center: {lat: 55.758, lng:36.353},
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            map.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng, map);
            });
            function placeMarkerAndPanTo(latLng, map) {
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map
                });
                map.panTo(latLng);
                $("#location").val(latLng.lat()+","+latLng.lng());
            }
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaGG7YrnMShaTEI7_E997AjRESAz6sYZg&callback=initMap"
            async defer></script>

@endsection