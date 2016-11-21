<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>MAPS TESTE</title>
    </head>
 
    <body>

         <div id="mapa" style="height: 500px; width: 500px">
        </div>
       <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA725OG4Uyt_o2gyuM00U9PcytQroKmdrU&amp;sensor=false"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="mapa2.js"></script>
        <script>

    function reqListener () {
        
      console.log(this.responseText);
      
    }

    var oReq = new XMLHttpRequest(); //New request object
    
    oReq.onload = function() {
        
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        
        run(this.responseText);
        
    };
    oReq.open("get", "teste_data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
    
</script>
    </body>
</html>


