var geocoder;
var map;
var marker;
$("head").append("<script type='text/javascript' src='https://raw.github.com/douglascrockford/JSON-js/master/json2.js'></script>");


function initialize() {
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
 
    geocoder = new google.maps.Geocoder();
 

}
 
    function carregarNoMapa(pontos) {

	//para cada ponto no json, carrega as coordenadas
        $.each(pontos, function(index, ponto) {
            console.log("Ponto na funcao carregarNoMapa:" +ponto);
    
        geocoder.geocode({ 'address': ponto['endereco_logradouro'] +', '+ponto['endereco_numero']+', '+ ponto['endereco_cidade']+' '+ ', Brasil', 'region': 'BR' }, function (results, status) {
            
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng(); 
		    var marker = new google.maps.Marker({
		        position: new google.maps.LatLng(latitude, longitude),
		        title: "Meu ponto personalizado! :-D",
		        map: map,
	    		icon: 'marcador.png'
		    });
 
                }
            }
        });
 
       });
 


    }

function run(pontos){
    initialize(); 	
    carregarNoMapa(pontos);
}


function reqListener () {
        
      console.log(this.responseText);
      
      
    }

    var oReq = new XMLHttpRequest(); //New request object
    
    oReq.onload = function() {
        
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        
        alert(this.responseText);
        
        var array = JSON.parse(this.responseText);
        
        console.log(array[0]);
        
        run(array);
        
        
    };
    
    
    oReq.open("get", "teste_data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
