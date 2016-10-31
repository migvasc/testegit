# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from sauceclient import SauceClient
import os

class COMSUCESSO(unittest.TestCase):
    def setUp(self):
        #self.driver = webdriver.Firefox()
        #self.driver.implicitly_wait(30)
#        self.base_url = "http://petajuda.herokuapp.com/"
        self.verificationErrors = []
        self.accept_next_alert = True
        #Sauce Labs
        self.desired_cap = {
        #'platform': "Mac OS X 10.9",
        'tunnel-identifier': os.environ.get('TRAVIS_JOB_NUMBER'), #IMPORTANT!!!
        'browserName': "chrome",
        'build': os.environ.get('TRAVIS_BUILD_NUMBER'),
        'name': "AskGitHub: Latest from GitHub",
        'tags': [ "python","github"],
        'username': os.environ.get('SAUCE_USERNAME'),
        'accessKey': os.environ.get('SAUCE_ACESS_KEY'),
        }
        self.SauceLogin = os.environ['SAUCE_USERNAME']
        self.SauceAccessKey = os.environ['SAUCE_ACESS_KEY']
        self.driver = webdriver.Remote(command_executor="http://%s:%s@ondemand.saucelabs.com:80/wd/hub" 
                      % (self.SauceLogin, self.SAUCE_ACESS_KEY),desired_capabilities=self.desired_cap)
        self.URL = "http://petajuda.herokuapp.com/"
        # Travis-CI & Sauce Labs
        self.URL = "http://localhost:" + os.environ.get('PORT') 
        self.driver.get(self.URL)
        self.status = True
        self.message = ""
    
    def test_c_o_m_s_u_c_e_s_s_o(self):
        driver = self.driver
        driver.get(self.base_url + "/login.php")
        driver.find_element_by_id("email").click()
        driver.find_element_by_id("email").clear()
        driver.find_element_by_id("email").send_keys("carlos@carlos.com")
        driver.find_element_by_id("senha").clear()
        driver.find_element_by_id("senha").send_keys("1234")
        driver.find_element_by_xpath("//button[@type='submit']").click()
        self.assertEqual("Bem-vindo(a), carlos", self.close_alert_and_get_its_text())
    
    def is_element_present(self, how, what):
        try: self.driver.find_element(by=how, value=what)
        except NoSuchElementException as e: return False
        return True
    
    def is_alert_present(self):
        try: self.driver.switch_to_alert()
        except NoAlertPresentException as e: return False
        return True
    
    def close_alert_and_get_its_text(self):
        try:
            alert = self.driver.switch_to_alert()
            alert_text = alert.text
            if self.accept_next_alert:
                alert.accept()
            else:
                alert.dismiss()
            return alert_text
        finally: self.accept_next_alert = True
    
    def tearDown(self):
        self.driver.quit()
        self.assertEqual([], self.verificationErrors)
        print("testing complete;closing connection")
        id = self.driver.session_id
        print("Link to job: https://saucelabs.com/jobs/%s" % (id))
        print("Errors?", self.message)
        sauce_client = SauceClient(self.SAUCE_USERNAME, self.SAUCE_ACESS_KEY)
        sauce_client.jobs.update_job(self.driver.session_id, passed=self.status)
        self.driver.quit()


if __name__ == "__main__":
    unittest.main()