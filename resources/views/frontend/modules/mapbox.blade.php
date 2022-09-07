@if($locations)

<div id="map"></div>    

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiZGF2b3J6ZWMiLCJhIjoiY2syenZsOWprMGpqZTNucDg1bHo4N3p2ZCJ9.YH8cOoPTp-fGFks7caEkkQ';
// This adds the map to your page
var map = new mapboxgl.Map({
  // container id specified in the HTML
  container: 'map',
  // style URL
  style: 'mapbox://styles/mapbox/streets-v11',
  // initial position in [lon, lat] format
  center: [17.223890, 45.592820],
  zoom: 6
});

//Navigation
var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'top-left');

var stores = {
  "type": "FeatureCollection",
  "features": [
      @foreach($locations as $location)
        {!! $location !!}
      @endforeach
  ]
};

map.on('load', function(e) {
  // Add the data to your map as a layer
  map.addLayer({
    id: 'locations',
    type: 'circle',
    paint: {
      'circle-radius': 3,
      'circle-color': '#fb6107',
      'circle-stroke-color': '#fb6107',
      'circle-stroke-width': 4,
      'circle-opacity': 1
    },
    // Add a GeoJSON source containing place coordinates and information.
    source: {
      type: 'geojson',
      data: stores
    }
  });
});

map.on('click', 'locations', function (e) {
var coordinates = e.features[0].geometry.coordinates.slice();
var naziv = e.features[0].properties.naziv;
var adresa = e.features[0].properties.address;
var id = e.features[0].properties.id;
 
// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
}
 
new mapboxgl.Popup()
.setLngLat(coordinates)
.setHTML('<h5 style="padding: 10px; margin-bottom: 0;">' + naziv + '</h5>'
        + '<span style="padding: 10px;">' + adresa + '</span>'
        + '<a class="btn btn-small btn-info" style="margin: 10px; padding: 0.1rem 0.2rem;" href="/'+ id +'">Posjeti</a>')
.addTo(map);
});
 
// Change the cursor to a pointer when the mouse is over the places layer.
map.on('mouseenter', 'locations', function () {
map.getCanvas().style.cursor = 'pointer';
});
 
// Change it back to a pointer when it leaves.
map.on('mouseleave', 'locations', function () {
map.getCanvas().style.cursor = '';
});


</script>

@endif