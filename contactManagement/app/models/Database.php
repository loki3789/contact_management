<?php
/**
 * Abstract class model for the configuration checkers.
 *
 * @author lokesh
 *         @SuppressWarnings docBlocks
 */
class Database {
        public function getConnection() {
                $host     = "localhost";
                $dbname   = "contacts-manager-database";
                $username = "root";
                $password = "root";
                $options = [
                        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
                    ];
                $pdo      = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,$options);
                return $pdo;
        }
        public function update($pdo, $data) {
                $stmt  = $pdo->prepare("UPDATE Contacts SET name = :name, email = :email, phonenumber = :phonenumber, "
                        . "birthdate = :birthdate WHERE id = :id;");
                $result = $stmt->execute([
                        ':name' => $data['name'], 
                        ':email' => $data['email'],
                        ':phonenumber' => $data['phonenumber'], 
                        ':birthdate' => $data['birthdate'],
                        ':id' => $data['id']
                        ]);
                return $result;
        }
        public function add($pdo, $data) {
                $stmt  = $pdo->prepare("INSERT INTO Contacts (name, email, phonenumber, birthdate) VALUES (?,?,?,?) ;");
                $result = $stmt->execute($data['name'],$data['email'],$data['phonenumber'],$data['birthdate']);
                return $result;
        }
        public function delete($pdo, $id) {
                $stmt  = $pdo->prepare("DELETE FROM Contacts WHERE id= :id ;");
                $result = $stmt->execute([
                        ':id' =>$id
                        ]);
                return $result;
                
        }
        public function all($pdo) {
                $stmt = $pdo->prepare("CALL select_all_contacts()");
                $stmt->bindParam(PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000); 

                // call the stored procedure
                $result = $stmt->execute();
                return $result;
        }
        public function getDataBy($pdo, $name) {
                $stmt  = $pdo->prepare("SELECT * FROM Contacts WHERE name LIKE :name;");
                $result = $stmt->execute([
                        ':name' =>$name
                        ]);
                return $result;
        }
}
