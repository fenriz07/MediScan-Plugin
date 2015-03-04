<?php namespace Mohsin\MediScan\Models;

use Model;

/**
 * Prop Model
 */
class Prop extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_mediscan_props';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $morphTo = [
            'prop' => []
        ];

    /**
     * @var array Cache for propList() method
     */
    protected static $propList = [];

    public function getTypeOptions()
    {
      return ['Scan'];
    }

    public static function getKindOptions($propId)
    {
        if (isset(self::$propList[$propId]))
            return self::$propList[$propId];
        return self::$propList[$propId] = self::whereTypeId($propId)->lists('name', 'id');
    }

}