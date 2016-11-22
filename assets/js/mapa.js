var geocoder = new google.maps.Geocoder();
var map;
var marker;

console.log("Chegou no mapa.js");

$("head").append("<script type='text/javascript' src='https://raw.github.com/douglascrockford/JSON-js/master/json2.js'></script>");


function inicializarMapa() {
    // console.log("endereco quando chega na funcao inicializar: "+user);
    
    var user_nome = document.getElementById("user_nome").value;
    var user_email = document.getElementById("user_email").value;
    var user_phone = document.getElementById("user_phone").value;
    var user_endereco_logradouro = document.getElementById("user_endereco_logradouro").value;
    var user_endereco_numero = document.getElementById("user_endereco_numero").value;
    var user_endereco_cidade = document.getElementById("user_endereco_cidade").value;
    var user_lat = -18.8800397;
    var user_lng = -47.05878999999999;
    
    geocoder.geocode({ 'address': user_endereco_logradouro +', '+user_endereco_numero+', '+ user_endereco_cidade+' '+ ', Brasil', 'region': 'BR' }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                user_lat = results[0].geometry.location.lat();
                user_lng = results[0].geometry.location.lng();
            }
        }
    });
    
    var latlng = new google.maps.LatLng(user_lat,user_lng);
    var options = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("map"), options);
    
    var contentString = '<div id="content">'+
                    		      '<div id="siteNotice">'+
            		      '</div>'+
            		      '<h3 id="firstHeading" class="firstHeading">'+user_nome+'</h3>'+
            		      '<div id="bodyContent">'+
            		      '<p><b>Contato: </b>'+user_email+'</p>'+
            		      '</div>'+
            		      '</div>';
    
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(user_lat, user_lng),
        title: user_tipo,
        map: map,
        icon: '../assets/images/marcador.png'
    });
 
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
                    		      '<h3 id="firstHeading" class="firstHeading">'+ponto[ponto]['nome']+'</h3>'+
                    		      '<div id="bodyContent">'+
                    		      '<p><b>Contato: </b>'+ponto[ponto]['email']+'</p>'+
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
