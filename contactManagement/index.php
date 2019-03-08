<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates


and open the template in the editor.
-->
<?php
require '../vendor/autoload.php';

$requested_name = "";
$paginate = 1;

$contact=new contactsController();
$config=new Config();
$contacts = $contact->allContacts();

if (isset($_POST['name'])) {
        $requested_name = $_POST['name'];
        $contacts = ($contact->contactsByName($requested_name) != []) ? $contact->contactsByName($requested_name) : $contacts;
}
$pages = $config->pages(sizeof($contacts));
if (isset($_GET['p'])) {
        $paginate = (((integer) $_GET['p'] == 0) || ((integer) $_GET['p'] > $pages)) ? 1 : (integer) $_GET['p'];
}
$contacts = $config->refill($paginate, $contacts);
include(realpath($_SERVER["DOCUMENT_ROOT"]) . '\contactManagement\app\views\mainPage.php');

?>
