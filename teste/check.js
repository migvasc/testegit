
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



/* Desse jeito nao esta funcionando porque a chamada ajax nao pode ser sincrona e usar o XMLHTTPRequest (em jquery.min.js)
describe('testAle', function() {
    var a = "nope0";

    var email = 'teste@teste.com';
    var senha = 'admin123';
    $.ajax({
        url: "http://localhost/assets/post/check_login.php",
        //url: "assets/post/check_login.php",
        type: "GET",
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
});*/


// Desse jeito nao funciona porque parece uqe o ajax nao eh chamado
/*describe("Ajax Tests", function() {
    var configuration = { url: "http://localhost/assets/post/check_login.php",
                          email: "teste@tes.com",
                          senha: "admin123"
                        };
    // aqui nao funciona porque a funcao andcallFake nao esta definida
    it("should make an Ajax request to the correct URL", function() {
        spyOn($, "ajax").andCallFake(function(e) {
            e.success({});
        });
     
        var callbacks = {
            checkForInformation: jasmine.createSpy(),
            displayErrorMessage: jasmine.createSpy(),
        };
     
        sendRequest(callbacks, configuration);
        expect(callbacks.checkForInformation).toHaveBeenCalled();  //Verifies this was called
        expect(callbacks.displayErrorMessage).not.toHaveBeenCalled();  //Verifies this was NOT called
    });
    
    //aqui nao funciona porque o ajax parece nao ser chamado (resposta = "nope")
    //it("should make an Ajax request to the correct URL", function() {
    //    spyOn($, "ajax");
    //    var x = sendRequest(undefined, configuration);
    //    expect(x).toEqual("yep");
    //});                  
});

function sendRequest(callbacks, configuration) {
    var x = "nope";
    
    $.ajax({
        url: configuration.url,
        type: "POST",
        data: {
            email: configuration.email,
            senha: configuration.senha
        },
        async: false,
        success: function(data) {
            x = "yep";
            callbacks.checkForInformation(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
            if(xhr.status==404) {
                x = "nope404";
            }
            else {
                x = xhr.statusText;
            }
        }
        //error: function(data) {
        //    x = "nopenope";
        //    callbacks.displayErrorMessage();
        //}
        
    });
    return x;
}*/

describe("A jQuery ajax request should be able to fetch...", function() {
    it("should make an AJAX request to the correct URL", function() {
        spyOn($, "ajax");
        getUserName("teste@teste.com", "admin123");
        expect($.ajax.mostRecentCall.args[0]["url"]).toEqual("http://localhost/assets/post/check_login.php");
    });
});

function getUserName(email, senha) {
    var a = "nope"
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
}