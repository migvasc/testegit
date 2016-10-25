//describe('getDiv', function() {
//    var d = document.querySelector('.box');

//    it('Should exist', function() {
//        expect(d.nodeName).toBe('DIV');
//    });
//});

//describe('Ajax login tests', function() {
    
//     it('should receive a successful response', function() {
//        spyOn($, "ajax").andCallFake(function(e) {
//        e.success({});
//        });
//    });
    
//    var username = 'teste@teste.com';
//    var senha = 'admin123';
    
//    getUserName(username,senha);
    
//    expect($.ajax.mostRecentCall.args[0]["url"]).toEqual("assets/post/check_login.php");
    
    //sendRequest(callbacks, configuration);
    //expect(callbacks.checkForInformation).toHaveBeenCalled();  //Verifies this was called
    //expect(callbacks.displayErrorMessage).not.toHaveBeenCalled(); 
//});



/*describe('testAle', function() {
    var a = "nope0";

    var email = 'teste@teste.com';
    var senha = 'admin123';
    $.ajax({
        url: "http://localhost/assets/post/check_login.php",
        //url: "assets/post/check_login.php",
        type: "POST",
        data: {
            email: email,
            senha: senha
        },
        cache: false,
        async: false,
        success: function(resposta) {
            if(resposta != null && resposta != ""){
                //usuario+senha = valido
                a = "yep";
            }
            else{
                //usuario+senha = invalido
                a = "nope1";
            }
        },
        error: function (xhr, ajaxOptions, thrownError){
            if(xhr.status==404) {
                a = "nope404";
            }
            else {
                a = xhr.statusText;
            }
        }
    });
    
    it('Should exist', function() {
        expect(a).toBe("yep");
    });
});
*/




describe("Ajax Tests", function() {
    var configuration = { url: "http://localhost/assets/post/check_login.php",
                          email: "teste@tes.com",
                          senha: "admin123"
                        };
      
    
    it("should make an Ajax request to the correct URL", function() {
        spyOn($, "ajax");
        sendRequest(undefined, configuration);
        expect($.ajax.mostRecentCall.args[0]["url"]).toEqual(configuration.url);
    });                  
});

function sendRequest(callbacks, configuration) {
    $.ajax({
        url: configuration.url,
        type: "POST",
        data: {
            email: configuration.email,
            senha: configuration.senha
        },
        async: false,
        success: function(data) {
            callbacks.checkForInformation(data);
        },
        error: function(data) {
            callbacks.displayErrorMessage();
        }
    });
}