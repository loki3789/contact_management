<?php
/**
 * Abstract class model for the configuration checkers.
 *
 * @author lokesh
 *         @SuppressWarnings docBlocks
 */
require_once '..\..\vendor\autoload.php';
class TestContactsController extends PHPUnit_Framework_TestCase {
        public function testMethodGetAllContacts() {
                $object   = new contactsController;
                $contacts = $object->allContacts();
                $this->assertArrayHasKey('id', $contacts[0]);
                $this->assertCount(7, $contacts);
                $this->assertSame($contacts[0]['id'], '29');
                $this->assertSame($contacts[0]['name'], 'lokesh s');
                $this->assertSame($contacts[0]['email'], 'lokeshs199712@gmail.com');
                $this->assertSame($contacts[0]['phonenumber'], '0666857013');
                $this->assertSame($contacts[0]['birthdate'], '12-12-2018');     
        }
        
        public function testMethodGetContactsByName() {
                $object   = new contactsController;
                $contacts = $object->contactsByName('Mark');
                $this->assertArrayHasKey('id', $contacts[0]);
                $this->assertCount(1, $contacts);
                $this->assertSame($contacts[0]['id'], '30');
                $this->assertSame($contacts[0]['name'], 'Mark');
                $this->assertSame($contacts[0]['email'], 'lokeshs199712@gmail.com');
                $this->assertSame($contacts[0]['phonenumber'], '0666857013');
                $this->assertSame($contacts[0]['birthdate'], '12-12-2018');     
        }
}