<?php namespace Mohsin\MediScan\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Patient Back-end Controller
 */
class Patient extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mohsin.MediScan', 'mediscan', 'patient');
    }
}