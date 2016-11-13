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
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e){
                alert("Your browser broke!");
            return false;
            }
        }
    }

   ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4){
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
