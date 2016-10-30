var By = require('selenium-webdriver').By,
    until = require('selenium-webdriver').until,
    firefox = require('selenium-webdriver/firefox');
 
module.exports = function(config) {
  config.set({
    frameworks: ['jasmine'],
 
    // define browsers 
    customLaunchers: {
      swd_firefox: {
        base: 'SeleniumWebdriver',
        browserName: 'Firefox',
        getDriver: function(){
          // example from https://www.npmjs.com/package/selenium-webdriver#usage 
          var driver = new firefox.Driver();
          return driver;
        }
      },
    },
 
    browsers: ['swd_firefox']
  });
};
