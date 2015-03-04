<?php namespace Mohsin\MediScan\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Mohsin\MediScan\Models\Patient;

/**
 * Scan Back-end Controller
 */
class Scan extends Controller
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
        BackendMenu::setContext('Mohsin.MediScan', 'mediscan', 'scan');
    }


    public function listOverrideColumnValue($record, $columnName, $definition = null)
    {
      if($columnName == 'patient_id')
      {
        return Patient::find($record -> patient_id)['name'];
      }
    }
}