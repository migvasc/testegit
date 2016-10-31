// Karma configuration
// Generated on Mon Oct 24 2016 22:35:36 GMT+0000 (UTC)
/*var By = require('selenium-webdriver').By,
    until = require('selenium-webdriver').until,
    firefox = require('selenium-webdriver/firefox');*/


module.exports = function(config) {
  config.set({

    // base path that will be used to resolve all patterns (eg. files, exclude)
    basePath: '',


    // frameworks to use
    // available frameworks: https://npmjs.org/browse/keyword/karma-adapter
    frameworks: ['jasmine'],


    // list of files / patterns to load in the browser
    files: [
      //'dist/*.js' , 'teste/*.js'
      
      'assets/js/jquery.min.js',
      //'assets/js/login.js' , 
      'teste/*.js' ,
      //{pattern: 'node_modules/assert/assert.js', included: true},
      //{pattern: 'node_modules/karma-selenium-webdriver-launcher/node_modules/q/q.js ', included: true},
    ],


    // list of files to exclude
    exclude: [
    ],


    // preprocess matching files before serving them to the browser
    // available preprocessors: https://npmjs.org/browse/keyword/karma-preprocessor
    preprocessors: {
    },


    // test results reporter to use
    // possible values: 'dots', 'progress'
    // available reporters: https://npmjs.org/browse/keyword/karma-reporter
    reporters: ['progress'],


    // web server port
    port: 9876,


    // enable / disable colors in the output (reporters and logs)
    colors: true,


    // level of logging
    // possible values: config.LOG_DISABLE || config.LOG_ERROR || config.LOG_WARN || config.LOG_INFO || config.LOG_DEBUG
    logLevel: config.LOG_INFO,


    // enable / disable watching file and executing tests whenever any file changes
    autoWatch: false,


    // start these browsers
    // available browser launchers: https://npmjs.org/browse/keyword/karma-launcher
    browsers: ['Firefox'],


    // Continuous Integration mode
    // if true, Karma captures browsers, runs the tests and exits
    singleRun: false,

    // Concurrency level
    // how many browser should be started simultaneous
    concurrency: Infinity,
    /*customLaunchers: {
      swd_firefox: {
        base: 'SeleniumWebdriver',
        browserName: 'Firefox',
        getDriver: function(){
          // example from https://www.npmjs.com/package/selenium-webdriver#usage 
          var driver = new firefox.Driver();
          return driver;
        }
      },
    },*/
 
    browsers: ['swd_firefox']
  })
}
