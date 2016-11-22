var geocoder = new google.maps.Geocoder();
var map;
var marker;

console.log("Chegou no mapa.js");

$("head").append("<script type='text/javascript' src='https://raw.github.com/douglascrockford/JSON-js/master/json2.js'></script>");


function inicializarMapa() {
    // console.log("endereco quando chega na funcao inicializar: "+user);
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("map"), options);
 
}
 
function carregarNoMapa(pontos) {
    // console.log("endereco quando chega na funcao inicializar: "+pontos);
    for(var ponto in pontos){
        geocoder.geocode({ 'address': pontos[ponto]['endereco_logradouro'] +', '+pontos[ponto]['endereco_numero']+', '+ pontos[ponto]['endereco_cidade']+' '+ ', Brasil', 'region': 'BR' }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var icon_per = '../assets/images/map-icon-'+pontos[ponto]['tipo']+'.png'
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng(); 
                    var contentString = '<div id="content">'+
                    		      '<div id="siteNotice">'+
                    		      '</div>'+
                    		      '<h3 id="firstHeading" class="firstHeading">'+ponto.nome+'</h3>'+
                    		      '<div id="bodyContent">'+
                    		      '<p><b>Contato: </b>'+ponto.email+'</p>'+
                    		      '</div>'+
                    		      '</div>';
                    
                    		  var infowindow = new google.maps.InfoWindow({
                    		    content: contentString
                    		  });
                    
    	            var marker = new google.maps.Marker({
    	                position: new google.maps.LatLng(latitude, longitude),
    	                title: pontos[ponto]['tipo'],
    	                map: map,
        		        icon: icon_per
    	            });
                }
            }
        });
    }
}

function reqListener () {
        
    console.log(this.responseText);
}

var oReq = new XMLHttpRequest(); //New request object
    
oReq.onload = function() {
        
    //This is where you handle what to do with the response.
    //The actual data is found on this.responseText
    
    // alert(this.responseText);
    
    var array = JSON.parse(this.responseText);
    
    inicializarMapa()
    carregarNoMapa(array);
};
    
    
oReq.open("get", "../assets/post/get_mapPoints.php", true);
oReq.send();
