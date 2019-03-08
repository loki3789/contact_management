<?php
/**
 * Abstract class model for the configuration checkers.
 *
 * @author lokesh
 *         @SuppressWarnings docBlocks
 */
require realpath($_SERVER["DOCUMENT_ROOT"]) . '\vendor\autoload.php';

namespace Controller;

class ContactsController {
        
        public function processRequest() {
                if (isset($_POST)) {
                        if (isset($_POST['add'])) {
                                $this->addContact($_POST);
                        }
                        
                        if (isset($_POST['modify'])) {
                                $this->modifyContact($_POST);
                        }
                        
                        if (isset($_POST['delete'])) {
                                $this->deleteContact($_POST['id']);
                        }
                }
        }
        public function modifyContact($post) {
                $databaseObject = new Database;
                $pdo            = $databaseObject->getConnection();
                $databaseObject->update($pdo, 'contacts', $post);
                header('location: ../../index.php');
        }
        
        public function addContact($post) {
                $databaseObject = new Database;
                $pdo            = $databaseObject->getConnection();
                $databaseObject->add($pdo, 'contacts', $post);
                header('location: ../../index.php');
        }
        
        public function deleteContact($id) {
                $databaseObject = new Database;
                $pdo            = $databaseObject->getConnection();
                $databaseObject->delete($pdo, 'contacts', $id);
                header('location: ./../../index.php');
        }
        
        public function allContacts() {
                $databaseObject = new Database;
                $pdo            = $databaseObject->getConnection();
                $index          = 0;
                $datas          = $databaseObject->all($pdo, 'contacts');
                $contacts = [];
                while ($row = $datas->fetch(PDO::FETCH_ASSOC)):
                        $id          = $row['id'];
                        $name        = $row['name'];
                        $email       = $row['email'];
                        $phonenumber = $row['phonenumber'];
                        $birthdate   = $row['birthdate'];
                        
                        $contacts[$index] = [
				'id' => $id,
				'name' => $name,
				'email' => $email,
				'phonenumber' => $phonenumber,
				'birthdate' => $birthdate,
				
			];
                        $index++;
                endwhile;
                return $contacts;
        }
        public function contactsByName($name) {
                $databaseObject = new Database;
                $pdo            = $databaseObject->getConnection();
                $index          = 0;
                $datas          = $databaseObject->getDataBy($pdo, 'contacts', $name);
                $contacts = [];
                while ($row = $datas->fetch(PDO::FETCH_ASSOC)):
                        $id          = $row['id'];
                        $name        = $row['name'];
                        $email       = $row['email'];
                        $phonenumber = $row['phonenumber'];
                        $birthdate   = $row['birthdate'];
                        
                        $contacts[$index] = [
				'id' => $id,
				'name' => $name,
				'email' => $email,
				'phonenumber' => $phonenumber,
				'birthdate' => $birthdate,
				
			];
                        $index++;
                endwhile;
                return $contacts;
        }
}