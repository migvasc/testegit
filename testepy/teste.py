import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from sauceclient import SauceClient
import os

class COMSUCESSO(unittest.TestCase):
    def setUp(self):
        #Sauce Labs
        self.desired_cap = {
        #'platform': "Mac OS X 10.9",
        'tunnel-identifier': os.environ.get('TRAVIS_JOB_NUMBER'), #IMPORTANT!!!
        'browserName': "chrome",
        'build': os.environ.get('TRAVIS_BUILD_NUMBER'),
        'name': "AskGitHub: Latest from GitHub",
        'tags': [ "python","flask","mongo","neo4j","github"],
        'username': os.environ.get('SauceLogin'),
        'accessKey': os.environ.get('SauceAccessKey'),
        }
        self.SauceLogin = os.environ['SauceLogin']
        self.SauceAccessKey = os.environ['SauceAccessKey']
        self.driver = webdriver.Remote(command_executor="http://%s:%s@ondemand.saucelabs.com:80/wd/hub" 
                      % (self.SauceLogin, self.SauceAccessKey),desired_capabilities=self.desired_cap)
        #self.URL = "http://askgithub.com"
        # Travis-CI & Sauce Labs
        self.URL = "http://localhost:" + os.environ.get('PORT') 
        self.driver.get(self.URL)
        self.status = True
        self.message = ""

    def test_suite(self):
        print("Test 1: Smoke test")
        try:    
            assert "Ask GitHub" in self.driver.title
        except:
            self.message = "Test 1 failed."
            self.status = False
        #
        print("Test 2: Trending now")    
        elem = self.driver.find_element_by_name("q")
        elem.send_keys("trending now")
        elem.send_keys(Keys.RETURN)
        try:
            assert "No results found" not in self.driver.page_source
        except:
            self.message += "Test 2 failed."
            self.status = False
        #
        print("Test 3: Top repositories")
        elem = self.driver.find_element_by_name("q")    
        elem.send_keys("top repositories")
        elem.send_keys(Keys.RETURN)
        elem = self.driver.find_elements_by_class_name("repositoryinfo")
        try:
            assert len(elem) > 0   #minimum 1 result
            elem = self.driver.find_element_by_class_name("repositoryinfo")
            elem.click() #click first link
            assert "No results found" not in self.driver.page_source
        except:
            self.message += "Test 3 failed."
            self.status = False   
    def test_c_o_m _s_u_c_e_s_s_o(self):
        sel = self.selenium
        sel.open("/login.php")
        sel.click("id=email")
        sel.type("id=email", "carlos@carlos.com")
        sel.type("id=senha", "1234")
        sel.click("//button[@type='submit']")
        self.assertEqual("Bem-vindo(a), carlos", sel.get_alert())

    def tearDown(self):
        print("testing complete;closing connection")
        id = self.driver.session_id
        print("Link to job: https://saucelabs.com/jobs/%s" % (id))
        print("Errors?", self.message)
        sauce_client = SauceClient(self.SauceLogin, self.SauceAccessKey)
        sauce_client.jobs.update_job(self.driver.session_id, passed=self.status)
        self.driver.quit()

if __name__ == "__main__":
    unittest.main()
