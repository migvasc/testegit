
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
  
# This is the only code you need to edit in your existing scripts.
# The command_executor tells the test to run on Sauce, while the desired_capabilities
# parameter tells us which browsers and OS to spin up.
desired_cap = {
    'platform': "Mac OS X 10.9",
    'browserName': "firefox",
    'version': "41",
}
driver = webdriver.Remote(
   command_executor='http://migvasc:edb8e905-bb7c-45f0-8c81-fa2a41402c5d@ondemand.saucelabs.com:80/wd/hub',
   desired_capabilities=desired_cap)
  
def login_sucesso():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("1234")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Unable to load google page!")
    print driver.title


login_sucesso()
driver.quit()