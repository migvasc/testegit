//var assert = require("assert");



//var assert= require("assert");
    //foo is now loaded.
    var assert=require('assert');

    //foo is now loaded.

    var webdriver=require('selenium-webdriver');



//var webdriver=require("selenium-webdriver");

//var webdriver = require("");
describe("O SITE EH ESSE?", function() {
    beforeEach(function() {
        this.browser = new webdriver.Builder()
        .withCapabilities({
        browserName: "firefox"
    }).build();
    return this.browser.get("http://petajuda.herokuapp.com/index.php");
    });
    afterEach(function() {
        return this.browser.quit();
    });
    it("URL SAO IGUAIS?", function(done) {
        
        var a = webdriver.getCurrentUrl();
        ///headline.click();
        //headline.getText().then(function(txt) {
            assert.equal(a, "1");
            //done();
        });
    //});
});

