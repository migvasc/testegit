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



describe('testAle', function() {
    var a = "nope0";

    var email = 'teste@teste.com';
    var senha = 'admin123';
    $.ajax({
        url: "../post/check_login.php",
        type: "POST",
        data: {
            email: email,
            senha: senha
        },
        cache: false,
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
        error: function() {
            //erro na funcao
            a = "nope2";
        },
    });
    
    it('Should exist', function() {
        expect(a).toBe("yep");
    });
});

//describe('Ajax login tests', function() {
//    it("should fail", function () {
//        var callback = jasmine.createSpy();
//        var email = 'teste@teste.com';
//        var senha = 'admin123';
//        getUserName(email, senha, callback);
//        waitsFor(function() {
//            return callback.callCount > 0;
//        });
//        runs(function() {
//            expect(callback).toHaveBeenCalled();
//        });
//    });
//});

//function getUserName(email, senha, callback){
    //$.ajax({
        //url: "assets/post/check_login.php",
        //type: "POST",
        //data: {
            //email: email,
            //senha: senha
        //},
      //  cache: false,
    //    success: callback
    //})
//}