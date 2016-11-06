mapboxgl.accessToken = 'pk.eyJ1IjoibmNvcm92aWMiLCJhIjoiY2l1bzQyZnVlMDAwazJ0b2VmNnFqNWJnMiJ9.gqNjGMKUu83qaZ-QVsv2Zw';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9', //stylesheet location
    center: [-74.50, 40], // starting position
    zoom: 9 // starting zoom
});