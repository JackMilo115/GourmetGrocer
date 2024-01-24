import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By

class TestRegistration(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("http://localhost/Gourmetgrocer/register.php")

    def test_valid_registration(self):
        # Input Data
        firstname_input = self.driver.find_element(By.ID, "fname")
        lastname_input = self.driver.find_element(By.ID, "sname")
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        passwordv_input = self.driver.find_element(By.ID, "password-v")
        submit_button = self.driver.find_element(By.ID, "submit")

        firstname_input.send_keys("John")
        lastname_input.send_keys("Doe")
        email_input.send_keys("user@example.com")
        password_input.send_keys("password123A!")
        passwordv_input.send_keys("password123A!")
        submit_button.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Assert that the registration is successful
        success_element = self.driver.find_element(By.CLASS_NAME, "alert")
        self.assertTrue("Please login with your new account" in success_element.text)

    def test_invalid_registration(self):
        # Input Data
        firstname_input = self.driver.find_element(By.ID, "fname")
        lastname_input = self.driver.find_element(By.ID, "sname")
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        passwordv_input = self.driver.find_element(By.ID, "password-v")
        submit_button = self.driver.find_element(By.ID, "submit")

        # Fill in invalid details
        firstname_input.send_keys("Invalid")
        lastname_input.send_keys("User")
        email_input.send_keys("email@email.com")
        password_input.send_keys("short")
        passwordv_input.send_keys("shor")
        submit_button.click()

        # Assert that the registration is successful
        success_element = self.driver.find_element(By.CLASS_NAME, "alert")
        self.assertTrue("Please fix the above errors" in success_element.text)

    def tearDown(self):
        self.driver.quit()

if __name__ == "__main__":
    unittest.main()