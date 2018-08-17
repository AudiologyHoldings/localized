<?php
/**
 * US Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AllValidation', 'Localized.Validation');

/**
 * AllValidationTest
 *
 */
class AllValidationTest extends CakeTestCase {

/**
 * test the phone method of AllValidation
 *
 * @return void
 */
    public function testPhone() {
        $this->assertTrue(AllValidation::phone('+1 702 425 5085'));
        $this->assertFalse(AllValidation::phone('teststring'));
        $this->assertFalse(AllValidation::phone('1-(33)-(333)-(4444)'));
        $this->assertFalse(AllValidation::phone('1-(33)-3333-4444'));
        $this->assertFalse(AllValidation::phone('1-(33)-33-4444'));
        $this->assertFalse(AllValidation::phone('1-(33)-3-44444'));
        $this->assertFalse(AllValidation::phone('1-(33)-3-444'));
        $this->assertFalse(AllValidation::phone('1-(33)-3-44'));
        $this->assertFalse(AllValidation::phone('33-33-444'));

        $this->assertFalse(AllValidation::phone('(055) 999-9999'));
        $this->assertFalse(AllValidation::phone('(155) 999-9999'));
        $this->assertFalse(AllValidation::phone('(595) 999-9999'));
        $this->assertFalse(AllValidation::phone('(213) 099-9999'));
        $this->assertFalse(AllValidation::phone('(213) 199-9999'));

        // invalid area-codes
        $this->assertFalse(AllValidation::phone('1-(511)-999-9999'));
        $this->assertFalse(AllValidation::phone('1-(295)-999-9999'));
        $this->assertFalse(AllValidation::phone('1-(555)-999-9999'));

        // invalid exhange
        $this->assertFalse(AllValidation::phone('1-(222)-511-9999'));

        // invalid phone number
        $this->assertFalse(AllValidation::phone('1-(222)-555-0199'));
        $this->assertFalse(AllValidation::phone('1-(222)-555-0122'));

        // valid phone numbers
        $this->assertTrue(AllValidation::phone('1-(369)-333-4444'));
        $this->assertTrue(AllValidation::phone('1-(973)-333-4444'));
        $this->assertTrue(AllValidation::phone('1-(313)-555-9999'));
        $this->assertTrue(AllValidation::phone('1-(222)-555-0299'));

        $this->assertTrue(AllValidation::phone('1 (222) 333 4444'));
        $this->assertTrue(AllValidation::phone('+1 (222) 333 4444'));
        $this->assertTrue(AllValidation::phone('(222) 333 4444'));

        $this->assertTrue(AllValidation::phone('1-(333)-333-4444'));
        $this->assertTrue(AllValidation::phone('1.(333)-333-4444'));
        $this->assertTrue(AllValidation::phone('1.(333).333-4444'));
        $this->assertTrue(AllValidation::phone('1.(333).333.4444'));
        $this->assertTrue(AllValidation::phone('1-333-333-4444'));
        $this->assertFalse(AllValidation::phone('7002 425 5085'));
        $this->assertTrue(AllValidation::phone('333-333-4444'));
    }
}
