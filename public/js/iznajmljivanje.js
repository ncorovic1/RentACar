function addField(){
            var row = document.getElementsByClassName("rowFilter");
            var container = document.getElementById("formFilter");
            row[1].style.display = 'block';
            var number = 5;
            for (i=0;i<number;i++) {
                /*
                    // Append a node with a random text
                    container.appendChild(document.createTextNode("Member " + (i+1)));
                    // Create an <input> element, set its type and name attributes
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "member" + i;
                    container.appendChild(input);
                    // Append a line break 
                    container.appendChild(document.createElement("br"));
                */
            }
        }

function omoguci(id) {
    els = document.getElementsByClassName(id);
    for(var i=0; i<2; i++) {
        //els[i].style.display = 'none';
        els[i].disabled = false;
    }
    
}

/*
    var datumi = document.getElementsByClassName("datum");
    var prosloVremena = document.getElementsByClassName("prosloVremena");
    for (var i = 0; i < datumi.length; i++) {
        var datum = new Date(datumi[i].innerHTML);
        prosloVremena[i].innerHTML = prosloOdObjave(datum);
        datumi[i].style.display = 'none';
		prosloVremena[i].style.display = 'block'; 
		prosloVremena[i].style.borderStyle = 'solid';
    }
*/