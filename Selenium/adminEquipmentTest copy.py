import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select

class TestRegistration(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("http://localhost/Gourmetgrocer/login.php")

    def test_1_valid_add_equipment(self):
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
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Equipment")
        admin_users_link.click()

        # Input Data
        name_input = self.driver.find_element(By.ID, "name")
        description_input = self.driver.find_element(By.ID, "description")
        image_input = self.driver.find_element(By.ID, "image")
        catagory_select = Select(self.driver.find_element(By.NAME, "catagory_id"))
        supplier_select = Select(self.driver.find_element(By.NAME, "supplier_id"))
        submit_button = self.driver.find_element(By.ID, "submit")

        name_input.send_keys("Test")
        description_input.send_keys("Test")
        image_input.send_keys("Test")
        catagory_select.select_by_index(0)
        supplier_select.select_by_index(0)
        submit_button.click()

        # Move to adminUser page again
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Equipment")
        admin_users_link.click()

        # Assert that the add is successful
        success_element = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/div/div/div/table")
        self.assertTrue("Test" in success_element.text)

    def test_2_valid_update_equipment(self):
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
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Equipment")
        admin_users_link.click()

        # Click on update
        submit_button = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/div/div/div/table/tbody[2]/tr[3]/td[7]/a")
        submit_button.click()

        # Input Data
        description_input = self.driver.find_element(By.ID, "description")
        submit_button = self.driver.find_element(By.ID, "submit")

        description_input.clear()
        description_input.send_keys("Updated")
        submit_button.click()

        # Move to adminUser page again
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Equipment")
        admin_users_link.click()

        # Assert that the add is successful
        success_element = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/div/div/div/table")
        self.assertTrue("Updated" in success_element.text)

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
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Equipment")
        admin_users_link.click()

        # Wait for login to complete
        self.driver.implicitly_wait(5)

        # Input Data
        submit_button = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/div/div/div/table/tbody[2]/tr[3]/td[8]/a")
        submit_button.click()

        # Move to adminUser page again
        admin_users_link = self.driver.find_element(By.LINK_TEXT, "Admin Equipment")
        admin_users_link.click()

        # Assert that the remove is successful
        success_element = self.driver.find_element(By.XPATH, "/html/body/div/div/div[1]/div/div/div/table")
        self.assertFalse("Test" in success_element.text)

    def tearDown(self):
        self.driver.quit()

if __name__ == "__main__":
    unittest.main()