
        var login = "teste@teste.com";
        var senha = "admin123";
      
     function hideMessage() {
       $( "#pMsg" ).html("");
     }
     
     function showMessage() {
       $( "#pMsg" ).html(MSG); 
     }
      
     function setUpHTMLFixture() {
        setFixtures('<form name="sentMessage" id="loginForm" novalidate>'
                                    +'<div class="row">'
                                        +'<div class="col-md-12">'
                                            +'<div class="form-group">'
                                                +'<input type="email" class="form-control" placeholder="Insira seu e-mail *" id="email" required data-validation-required-message="Por favor insira seu e-mail.">'
                                                +'<p class="help-block text-danger"></p>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-12">'
                                            +'<div class="form-group">'
                                                +'<input type="password" class="form-control" placeholder="Insira sua senha *" id="senha" required data-validation-required-message="Por favor, insira sua senha."></textarea>'
                                                +'<p class="help-block text-danger"></p>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="clearfix"></div>'
                                        +'<div class="col-lg-12 text-center">'
                                            +'<div id="success"></div>'
                                            +'<button id="enviar" type="submit" class="btn btn-primary full-width">Entrar</button>'
                                        +'</div>'
                                    +'</div>'
                                +'</form>');
       
    }

describe("DOM TESTS:***************", function() { 
  describe("Button Click Event Tests", function() {
    var spyEvent;
    beforeEach(function() {
      setUpHTMLFixture();
    });
    
    it ("should invoke the btnShowMessage click event.", function() {
      spyEvent = spyOnEvent('#enviar', 'click');
      $('#email').val(MSG);
      $('#enviar').trigger( "click" );
           
      expect('click').toHaveBeenTriggeredOn('#enviar');
      expect(spyEvent).toHaveBeenTriggered();
    });
       
  });
       
  /*describe("Show message tests", function() {
    beforeEach(function() {
      setUpHTMLFixture();
      $('#enviar').val(MSG);
      $('#btnShowMessage').trigger( "click" );
    });
     
    it ("should display the message when button is clicked.", function() {
      expect($('#pMsg')).toHaveText($('#txtMessage').val());
    });
  });*/
    

});


