//describe('getDiv', function() {
//    var d = document.querySelector('.box');

//    it('Should exist', function() {
//        expect(d.nodeName).toBe('DIV');
//    });
//});

describe('Ajax login tests', function() {
    
     it('should receive a successful response', function() {
        spyOn($, "ajax").andCallFake(function(e) {
        e.success({});
    });
    
    var username = 'teste@teste.com';
    var senha = 'admin123';
    
    getUserName(username,senha);
    
    expect($.ajax.mostRecentCall.args[0]["url"]).toEqual("assets/post/check_login.php");
    
    //sendRequest(callbacks, configuration);
    //expect(callbacks.checkForInformation).toHaveBeenCalled();  //Verifies this was called
    //expect(callbacks.displayErrorMessage).not.toHaveBeenCalled(); 
});
