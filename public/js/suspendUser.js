function loadSuspendForm(id, name, username) {
    document.getElementById("nameSurnameUsername").innerHTML = name + "<br><i style='color:lightgray;font-size:24px'>@" + username + "</i>";
    var select = document.getElementById('vehiclesRented');
    select.options.length = 1;
    var form = document.getElementById("suspendForm");
    if (form.style.display == "none")
        form.style.display = "";
    document.getElementById("userID").value = id;
    loadRentedVehicles(id);
}

function loadRentedVehicles(id) {
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
            var text = ajaxRequest.responseText;
            text = text.replace(/&quot;/g, '\"');
            var vehicles = JSON.parse(text);
            var select = document.getElementById('vehiclesRented');
            for (var i = 0; i < vehicles.length; i++) {
                var opt = document.createElement('option');
                opt.value = vehicles[i]['id'];
                opt.innerHTML = vehicles[i]['id'];
                select.appendChild(opt);
            }
        }
    }
    ajaxRequest.open("GET", "loadUserVehicles/" + id, true);
    ajaxRequest.send(null);
}