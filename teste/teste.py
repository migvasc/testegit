
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import urllib2
  
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
  
def login_sucess():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("1234")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Algo errado no login!")
    print "Teste login_sucess - done"
    
def login_fail_emptyEmail():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("1234")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Login" in driver.title:
        raise Exception("Login com e-mail vazio passando!")
    print "Teste login_fail_emptyEmail - done"
    
def login_fail_emptySenha():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Login" in driver.title:
        raise Exception("Login com senha vazia passando!")
    print "Teste login_fail_emptySenha - done"

def login_fail_emptyEmail_emptySenha():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Login" in driver.title:
        raise Exception("Login com e-mail vazio e senha vazia passando!")
    print "Teste login_fail_emptyEmail_emptySenha - done"

def login_fail_wrongEmail():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@teste.com")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("1234")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Login" in driver.title:
        raise Exception("Login que nao existe passando!")
    print "Teste login_fail_wrongEmail - done"
    
def login_fail_wrongSenha():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha").clear()
    driver.find_element_by_id("senha").send_keys("123")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Login" in driver.title:
        raise Exception("Login com senha errada passando!")
    print "Teste login_fail_wrongSenha - done"
    
def logout():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/logout.php")
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Logout nao esta redirecionando corretamente!")
    print "Teste logout - done"

def signup_sucess():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Carlos")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Santos")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@teste.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("123")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Algo errado no cadastro ... era pra dar certo!")
    print "Teste signup_sucess - done"
    
def signup_fail_emptyNome():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Santos")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("123")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com nome vazio passando!")
    print "Teste signup_fail_emptyNome -  done"

def signup_fail_emptySobrenome():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Carlos")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("123")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com nome vazio passando!")
    print "Teste signup_fail_emptySobrenome - done"
    
def signup_fail_emptyEmail():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Carlos")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Santos")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("123")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com email vazio passando!")
    print "Teste signup_fail_emptyEmail - done"
    
def signup_fail_emptySenha1():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Carlos")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Santos")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("123")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com email vazio passando!")
    print "Teste signup_fail_emptySenha1 - done"
    
def signup_fail_emptySenha2():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Carlos")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Santos")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com email vazio passando!")
    print "Teste signup_fail_emptySenha2 - done"
    
def signup_fail_Senha1Senha2NotEqual():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Carlos")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Santos")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@carlos.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("1234")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com email vazio passando!")
    print "Teste signup_fail_Senha1Senha2NotEqual - done"
    
def signup_fail_userAlreadyRegistered():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.find_element_by_id("nome").click()
    driver.find_element_by_id("nome").clear()
    driver.find_element_by_id("nome").send_keys("Teste")
    driver.find_element_by_id("sobrenome").clear()
    driver.find_element_by_id("sobrenome").send_keys("Teste")
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("teste@teste.com")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("123")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("123")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Cadastro" in driver.title:
        raise Exception("Cadastro com email vazio passando!")
    print "Teste signup_fail_userAlreadyRegistered - done"

def redirect_login():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/login.php")
    driver.implicitly_wait(5)
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Algo errado com a sessao!")
    print "Teste redirect_login - done"    
    
def redirect_signup():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/cadastro.php")
    driver.implicitly_wait(5)
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Algo errado com a sessao!")
    print "Teste redirect_signup - done"

def redirect_home():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/home/index.php")
    driver.implicitly_wait(5)
    if not "Pet Ajuda | Login" in driver.title:
        raise Exception("Algo errado com a redirecionamento para o login!")
    print "Teste redirect_home - done"

def reset_success():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/esqueciminhasenha.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@teste.com")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("novasenha")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("novasenha")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Home" in driver.title:
        raise Exception("Esqueci minha senha nao funcionando!")
    print "Teste reset_success - done"

def reset_fail_wrongAnswer():
    driver.implicitly_wait(10)
    driver.get("http://petajuda.herokuapp.com/esqueciminhasenha.php")
    driver.find_element_by_id("email").click()
    driver.find_element_by_id("email").clear()
    driver.find_element_by_id("email").send_keys("carlos@teste.com")
    driver.find_element_by_id("pergunta").clear()
    driver.find_element_by_id("pergunta").send_keys("tobby2")
    driver.find_element_by_id("senha1").clear()
    driver.find_element_by_id("senha1").send_keys("novasenha")
    driver.find_element_by_id("senha2").clear()
    driver.find_element_by_id("senha2").send_keys("novasenha")
    driver.find_element_by_xpath("//button[@type='submit']").click()
    if not "Pet Ajuda | Esqueci minha senha" in driver.title:
        raise Exception("Esqueci minha senha deixando passar com resposta errada!")
    print "Teste reset_fail_wrongAnswer - done"



login_fail_emptyEmail()
login_fail_emptySenha()
login_fail_emptyEmail_emptySenha()
login_fail_wrongEmail()
login_fail_wrongSenha()
login_sucess()

redirect_login()
redirect_signup()
logout()
redirect_home()

signup_fail_emptyNome()
signup_fail_emptySobrenome()
signup_fail_emptyEmail()
signup_fail_emptySenha1()
signup_fail_emptySenha2()
signup_fail_Senha1Senha2NotEqual()
signup_fail_userAlreadyRegistered()
signup_sucess()
logout()

reset_fail_wrongAnswer()
reset_success()


#driver.get("http://petajuda.herokuapp.com/cleanDB.php")
urllib2.urlopen('http://petajuda.herokuapp.com/cleanDB.php')
driver.quit()