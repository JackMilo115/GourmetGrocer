import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By

class TestLogin(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("http://localhost/Gourmetgrocer/login.php")

    def test_1_valid_login(self):
        # Input Data
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.ID, "submit")

        email_input.send_keys("user@example.com")
        password_input.send_keys("password123A!")
        submit_button.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Assert that the login is successful
        success_element = self.driver.find_element(By.TAG_NAME, "h1")
        self.assertTrue("Welcome John!" in success_element.text)

    def test_2_invalid_login(self):
        # Input Data
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.ID, "submit")

        email_input.send_keys("invalid_user@exampl")
        password_input.send_keys("invalid_password")
        submit_button.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Assert that the login fails as expected
        success_element = self.driver.find_element(By.CLASS_NAME, "alert")
        self.assertTrue("Please fix the above errors." in success_element.text)

    def tearDown(self):
        self.driver.quit()

if __name__ == "__main__":
    unittest.main()