function validateRI(id) {
    var d1Check = document.getElementById('d' + id).value;
    var d2Check = document.getElementById('d' + (id + 1000)).value;
    if (d1Check != "" && d2Check != "") {
        var d1 = new Date(d1Check);
        var d2 = new Date(d2Check);
        
        differenceMS = d2.getTime() - d1.getTime();
        if (differenceMS > 0) {
            document.getElementById('butt' + id).className = "btn btn-primary";
            document.getElementById('butt' + id).removeAttribute("disabled");
            document.getElementById('proc' + id).className = "btn btn-default";
            document.getElementById('proc' + id).removeAttribute("disabled");
            return;
        }
    }
    document.getElementById('butt' + id).className = "btn btn-primary disabled";
    document.getElementById('butt' + id).setAttribute("disabled", true);
    document.getElementById('proc' + id).className = "btn btn-default disabled";
    document.getElementById('proc' + id).setAttribute("disabled", true);
    document.getElementById('rentInformation' + id).innerHTML = "";
}

function rentInformation(price, id) {
    var d1 = new Date(document.getElementById('d'+id).value);
    var d2 = new Date(document.getElementById('d'+(id+1000)).value);

    differenceMS = d2.getTime() - d1.getTime();
    numberOfHours = Math.floor( differenceMS / (1000 * 3600) );

    var tekst = "Reservation of car for " + numberOfHours         + " hours.<br>";
    tekst    += "Price per hour "         + price                 + " $.<br>";
    tekst    += "Total rent amount: "     + numberOfHours * price + " $.<br>";
    tekst    += "Do you wish to proceed?<br>";
    var rentInformation = document.getElementById('rentInformation'+id);
    rentInformation.innerHTML = tekst;
}

function completeRent(user_id, vehicle_id) {
    id = vehicle_id;
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
            window.location = "myrents";
        }
    }
    var d1 = document.getElementById('d'+id).value;
    var d2 = document.getElementById('d'+(id+1000)).value;

    var query = "/" + user_id + "/" + vehicle_id + "/" + d1 + "/" + d2;
    ajaxRequest.open("GET", "addReservation" + query, true);
    ajaxRequest.send(null);
}

function checkAvailability(id) {
    var d1Check = document.getElementById('d' + id).value;
    var d2Check = document.getElementById('d' + (id + 1000)).value;
    var d1 = new Date(d1Check);
    var d2 = new Date(d2Check);
    if (d1Check != "" && d2Check != "" && (d2.getTime() - d1.getTime()) > 0) {
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
                var availability = ajaxRequest.responseText;
                if (availability == 0) {
                    document.getElementById('butt' + id).setAttribute("disabled", true);
                    document.getElementById('proc' + id).setAttribute("disabled", true);
                    document.getElementById("vehicleAvailabilityNotice").innerHTML = "<b style='color:red'>Vozilo je rezervisano unutar željenog perioda.</b>";
                }
                else {
                    document.getElementById('butt' + id).removeAttribute("disabled");
                    document.getElementById('proc' + id).removeAttribute("disabled");
                    document.getElementById("vehicleAvailabilityNotice").innerHTML = "";
                }
            }
        }
        var query = "/" + id + "/" + d1.getTime() + "/" + d2.getTime();
        ajaxRequest.open("GET", "checkAvailability" + query, true);
        ajaxRequest.send(null);
    }
}
