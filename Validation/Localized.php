<?php

/**
 * Validation class defining some custom Localized-based methods.
 *
 */
class Localized {
    // Array of all validators available in Localized
    private static $validators = [
        'address1',
        'addressCode',
        'address_code',
        'alphanumeric',
        'cc',
        'cf',
        'cnpj',
        'cpf',
        'dob',
        'hirigana',
        'jmbg',
        'katakana',
        'mobile',
        'passport',
        'personId',
        'pesel',
        'phone',
        'postal',
        'postal_number',
        'regon',
        'nicn',
        'numeric',
        'snils',
        'ssn',
        'trIdentityNumber',
        'ubn',
        'vatin',
        'zenkaku',
    ];

    /**
     * Constructor
     *
     */
    public function __construct()
    {

    }

    /**
     * Returns an array of all the validator methods supported by this plugin
     *
     * @return array $validators
     */
    public static function validators() {
        return self::$validators;
    }
}