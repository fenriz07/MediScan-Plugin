<?php namespace Mohsin\MediScan\Models;

use Model;
use Flash;
use Mohsin\MediScan\Models\Prop;

/**
 * Patient Model
 */
class Patient extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_mediscan_patients';

    /**
     * @var array Relations
     */
    public $morphMany = [
        'prop' => ['Mohsin\MediScan\Models\Prop', 'type' => 'prop']
    ];

    public function afterCreate()
    {
      // Add this to the prop as well
      $prop = new Prop;
      $prop -> type = 'Patient';
      $prop -> prop_id = $this -> id;

      // Returns false if model is invalid
      $success = $prop->save();
      if($success)
        return Flash::success('Successfully Added Prop');
      else
        return Flash::error('Failed to add the prop');
    }

    public function afterDelete()
    {
        Prop::where('type', '=', 'Patient')->where('prop_id', '=', $this -> id)->delete();
        return Flash::success('Successfully Deleted Prop');
    }

}