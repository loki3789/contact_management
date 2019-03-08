<?php
namespace PHPCheckstyle\Config;
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
                $pdo      = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                return $pdo;
        }
        public function update($pdo, $table, $data) {
                $query  = "UPDATE `" . $table . "` SET " . "`name` = '" . $data['name'] . "', " . "`email` = '" . $data['email'] .
                          "', " . "`phonenumber` = '" . $data['phonenumber'] . "', " . "`birthdate` = '" . $data['birthdate'] . 
                        "' WHERE `id` = " . $data['id'] . " ;";
                $stmt   = $pdo->prepare($query);
                $result = $stmt->execute();
                return $result;
        }
        public function add($pdo, $table, $data) {
                $query  = "INSERT INTO `" . $table . "`(name, email, phonenumber, birthdate) VALUES ('" . $data['name'] . 
                          "', '" . $data['email'] . "', '" . $data['phonenumber'] . "', '" . $data['birthdate'] . "') ;";
                $stmt   = $pdo->prepare($query);
                $result = $stmt->execute();
                return $result;
        }
        public function delete($pdo, $table, $id) {
                $query  = "DELETE FROM `" . $table . "` WHERE `id` = " . $id . " ;";
                $stmt   = $pdo->prepare($query);
                $result = $stmt->execute();
                return $result;
                
        }
        public function all($pdo, $table) {
                $query = "SELECT * FROM `" . $table . "` ;";
                $stmt  = $pdo->query($query);
                return $stmt;
        }
        public function getDataBy($pdo, $table, $name) {
                $query = "SELECT * FROM `" . $table . "` WHERE `name` LIKE '" . $name . "%' ;";
                $stmt  = $pdo->query($query);
                return $stmt;
        }
}