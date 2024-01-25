import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select

class TestRegistration(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("http://localhost/Gourmetgrocer/login.php")

    def test_1_valid_add_user(self):
        # Login as admin
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.ID, "submit")

        email_input.send_keys("jack@milo.com")
        password_input.send_keys("123456aA!")
        submit_button.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Move to adminUser page
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Users")
        admin_users_link.click()

        # Input Data
        firstname_input = self.driver.find_element(By.ID, "fname")
        lastname_input = self.driver.find_element(By.ID, "sname")
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        role_select = Select(self.driver.find_element(By.NAME, "role"))
        submit_button = self.driver.find_element(By.ID, "submit")

        firstname_input.send_keys("John")
        lastname_input.send_keys("Doe")
        email_input.send_keys("user@example.com")
        password_input.send_keys("password123A!")
        role_select.select_by_index(0)
        submit_button.click()

        # Move to adminUser page again
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Users")
        admin_users_link.click()

        # Assert that the add is successful
        success_element = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/table")
        self.assertTrue("John" in success_element.text)

    def test_2_valid_update_user(self):
        # Login as admin
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.ID, "submit")

        email_input.send_keys("jack@milo.com")
        password_input.send_keys("123456aA!")
        submit_button.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Move to adminUser page
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Users")
        admin_users_link.click()

        # Click on update
        submit_button = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/table/tbody[2]/tr[4]/td[6]/a")
        submit_button.click()

        # Input Data
        lastname_input = self.driver.find_element(By.ID, "sname")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.ID, "submit")

        lastname_input.clear()
        lastname_input.send_keys("Smith")
        password_input.send_keys("password123A!")
        submit_button.click()

        # Move to adminUser page again
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Users")
        admin_users_link.click()

        # Assert that the add is successful
        success_element = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/table")
        self.assertTrue("Smith" in success_element.text)

    def test_3_valid_remove_user(self):
        # Login as admin
        email_input = self.driver.find_element(By.ID, "email")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.ID, "submit")

        email_input.send_keys("jack@milo.com")
        password_input.send_keys("123456aA!")
        submit_button.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Move to adminUser page
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Users")
        admin_users_link.click()

        # Input Data
        submit_button = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/table/tbody[2]/tr[4]/td[7]/a")
        submit_button.click()

        # Move to adminUser page again
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Users")
        admin_users_link.click()

        # Assert that the remove is successful
        success_element = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/table")
        self.assertFalse("John" in success_element.text)

    def tearDown(self):
        self.driver.quit()

if __name__ == "__main__":
    unittest.main()