function filterData() {
    var ajaxRequest;
    try {
        ajaxRequest = new XMLHttpRequest();
    }
    catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            var ajaxFilterSearch = document.getElementById('ajaxFilterSearch');
            ajaxFilterSearch.innerHTML = ajaxRequest.responseText;
        }
    }
    var price        = document.getElementsByClassName('1')[0].value;
    var form         = document.getElementsByClassName('2')[0].value;
    var transmission = document.getElementsByClassName('3')[0].value;
    var fuel         = document.getElementsByClassName('4')[0].value;
    var priorities = String(document.getElementsByClassName('1')[1].value); 
    priorities    += String(document.getElementsByClassName('2')[1].value);
    priorities    += String(document.getElementsByClassName('3')[1].value);
    priorities    += String(document.getElementsByClassName('4')[1].value);
    var query = "/" + price + "/" + form + "/" + transmission + "/" + fuel + "/" + priorities;
    ajaxRequest.open("GET", "filterCars" + query, true);
    ajaxRequest.send(null);
}

function loadParkingLots(id = 0) {
    /*var geojson = {
            type: 'FeatureCollection',
            features: 
            [
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-77.03238901390978, 38.913188059745586]
                    },
                    "properties": {
                    "title": "Mapbox DC",
                    "description": "1714 14th St NW, Washington DC",
                    "marker-color": "#fc4353",
                    "marker-size": "large",
                    "marker-symbol": "monument"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": 
                    {
                        "type": "Point",
                        "coordinates": [-122.414, 37.776]
                    },
                    "properties": 
                    {
                        "title": "Mapbox SF",
                        "description": "155 9th St, San Francisco",
                        "marker-color": "#fc4353",
                        "marker-size": "large",
                        "marker-symbol": "harbor"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": 
                    {
                        "type": "Point",
                        "coordinates": [-122.414, 37.776]
                    },
                    "properties": 
                    {
                        "title": "Mapbox SF",
                        "description": "155 9th St, San Francisco",
                        "marker-color": "#fc4353",
                        "marker-size": "large",
                        "marker-symbol": "harbor"
                    }
                }
            ]
        };*/
    var ajaxRequest;
    try {
        ajaxRequest = new XMLHttpRequest();
    }
    catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            var geojson = {
                "type":"FeatureCollection",
                "features":[
                    {
                        "type":"Feature",
                        "geometry":{
                            "type":"Point",
                            "coordinates":[]
                        },
                        "properties":
                        {
                            "title": "",
                            "description": "",
                            "marker-color": "#fc4353",
                            "marker-size": "large",
                            "marker-symbol": "harbor"
                        }
                    },
                    {
                        "type":"Feature",
                        "geometry":{
                            "type":"Point",
                            "coordinates":[]
                        },
                        "properties":
                        {
                            "title": "",
                            "description": "",
                            "marker-color": "#fc4353",
                            "marker-size": "large",
                            "marker-symbol": "harbor"
                        }
                    },
                    {
                        "type":"Feature",
                        "geometry":{
                            "type":"Point",
                            "coordinates":[]
                        },
                        "properties":
                        {
                            "title": "",
                            "description": "",
                            "marker-color": "#fc4353",
                            "marker-size": "large",
                            "marker-symbol": "harbor"
                        }
                    }
                ]
            };
            var text = ajaxRequest.responseText;
            text = text.replace(/&quot;/g, '\"');
            var lots = JSON.parse(text);
            for (var i = 0; i < lots.length; i++) {
                geojson.features[i].properties.title = lots[i]['name'];
                geojson.features[i].properties.description = lots[i]['address'];
                geojson.features[i].geometry.coordinates.push(lots[i]['lng'], lots[i]['lat']);
            }
            if (id > 0) {
                for (var i = 0; i < lots.length; i++) {
                    if (id == lots[i]['id']) {
                        geojson.features[i].properties['marker-color'] = "#0000ff";
                    }
                }
            }

            map.featureLayer.setGeoJSON(geojson);
        }
    }
    ajaxRequest.open("GET", "loadParkingLots", true);
    ajaxRequest.send(null);
}