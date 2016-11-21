var geocoder;
var map;
var marker;

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
 
        geocoder.geocode({ 'address': ponto.rua +', '+ponto.num+', '+ ponto.cidade+' '+ ', Brasil', 'region': 'BR' }, function (results, status) {
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

