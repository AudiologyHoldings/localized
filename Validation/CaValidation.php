<?php
/**
 * Canadian Localized Validation class. Handles localized validation for Canada.
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
App::uses('LocalizedValidation', 'Localized.Validation');

/**
 * CaValidation
 *
 */
class CaValidation extends LocalizedValidation {

/**
 * Checks a postal code for Canada.
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function postal($check) {
		//$pattern = '/\\A\\b[ABCEGHJKLMNPRSTVXY][0-9][A-Z] [0-9][A-Z][0-9]\\b\\z/i'; // Spaces required
		$pattern = '/^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$/i'; // Spaces optional
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks a phone number.
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function phone($check) {
        	// includes all NANPA members. – pulled from CakePHP default Validation class
                // see http://en.wikipedia.org/wiki/North_American_Numbering_Plan#List_of_NANPA_countries_and_territories
                $pattern = '/^(?:(?:\+?1\s*(?:[.-]\s*)?)?';

                // Area code 555, X11 is not allowed.
                $areaCode = '(?![2-9]11)(?!555)([2-9][0-8][0-9])';
                $pattern .= '(?:\(\s*' . $areaCode . '\s*\)|' . $areaCode . ')';
                $pattern .= '\s*(?:[.-]\s*)?)';

                // Exchange and 555-XXXX numbers
                $pattern .= '(?!(555(?:\s*(?:[.\-\s]\s*))(01([0-9][0-9])|1212)))';
                $pattern .= '(?!(555(01([0-9][0-9])|1212)))';
                $pattern .= '([2-9]1[02-9]|[2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)';

                // Local number and extension
                $pattern .= '?([0-9]{4})';
                $pattern .= '(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/';
                return (bool)preg_match($pattern, $check);
	}

/**
 * Checks a country specific identification number.
 *
 * @param string $check The value to check.
 * @return bool Success.
 * @throws NotImplementedException
 */
	public static function personId($check) {
		throw new NotImplementedException('Validation method not implemented yet.');
	}

}
