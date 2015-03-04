<?php namespace Mohsin\MediScan\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Prop Back-end Controller
 */
class Prop extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['mohsin.mediscan.access_props'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Mohsin.MediScan', 'mediscan', 'prop');
    }

}