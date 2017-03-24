@extends('layouts.app')

@section('content')
<a href="/waters/create">Добавить </a>
    <br/>
    <ul>
    @foreach($waters as $water)
        <li>{{$water->name}}</li>
    @endforeach
    </ul>
<div id="map" style="height: 300px"></div>
<script type="text/javascript">
function initMap(){
            @if(count($waters) > 0)
    var mapOptions = {
        zoom: 4,
        center: new google.maps.LatLng({{$waters[0]->location}})
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);


            @foreach($waters as $item)
                var marker{{$item->id}} = new google.maps.Marker({
        position: new google.maps.LatLng({{$item->location}}),
        map: map,
        label: "{{$item->name}}",
        title: "{{$item->name}}"
    });
    @endforeach
@endif
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaGG7YrnMShaTEI7_E997AjRESAz6sYZg&callback=initMap"
        async defer></script>
@endsection

