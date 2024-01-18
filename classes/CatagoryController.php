<?php
    class CatagoryController
    {
        protected $db; // Property to store the database controller object

        // Constructor to initialize the CatagoryController with a database controller object
        public function __construct(DatabaseController $db)
        {
            $this->db = $db;
        }

        // Function to create a new catagory entry in the database
        public function create_catagory(array $catagory) 
        {
            // SQL query to insert new catagory data into the catagories table
            $sql = "INSERT INTO catagories(name)
            VALUES (:name);";
            
            // Execute the SQL query with the provided catagory data
            $this->db->runSQL($sql, $catagory);
            
            // Return the ID of the last inserted role
            return $this->db->lastInsertId();
        }

        // Function to retrieve a specific catagory by its ID
        public function get_catagory_by_id(int $id)
        {
            // SQL query to select role data by ID
            $sql = "SELECT * FROM catagories WHERE id = :id";
            $args = ['id' => $id];
            
            // Execute the query and return the result
            return $this->db->runSQL($sql, $args)->fetch();
        }

        // Function to retrieve all catagory entries from the database
        public function get_all_catagories()
        {
            // SQL query to select all role data
            $sql = "SELECT * FROM catagories";
            
            // Execute the query and return all results
            return $this->db->runSQL($sql)->fetchAll();
        }

        // Function to update an existing role entry in the database
        public function update_catagory(array $catagory)
        {
            // SQL query to update role data
            $sql = "UPDATE catagories SET name = :name WHERE id = :id";
            
            // Execute the update query with the provided role data
            return $this->db->runSQL($sql, $catagory);
        }

        // Function to delete a specific role entry by its ID
        public function delete_catagory(int $id)
        {
            // SQL query to delete role data by ID
            $sql = "DELETE FROM catagories WHERE id = :id";
            $args = ['id' => $id];
            
            // Execute the delete query
            return $this->db->runSQL($sql, $args);
        }
    }
?>