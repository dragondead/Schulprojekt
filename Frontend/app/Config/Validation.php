<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{

    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single'
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $accountChangePassword = [
        'newPassword' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Dies ist ein Pflichtfeld.',
                'min_length' => 'Min. Länge ist 6 Zeichen.'
            ]
        ],
        'confirmPassword' => [
            'rules' => 'required|min_length[6]|matches[newPassword]',
            'errors' => [
                'required' => 'Dies ist ein Pflichtfeld.',
                'min_length' => 'Min. Länge ist 6 Zeichen.',
                'matches' => 'Stimmt nicht mit << Neues Passwort >> überein.'
            ]
        ]
    ];
}
