<?php namespace Mohsin\MediScan;

use Event;
use Backend;
use System\Classes\PluginBase;

/**
 * MediScan Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'MediScan',
            'description' => 'The online medical prop repository',
            'author'      => 'Mohsin',
            'icon'        => 'icon-medkit'
        ];
    }

    public function registerNavigation()
    {
        return [
            'mediscan' => [
                'label'       => 'Props',
                'url'         => Backend::url('mohsin/mediscan/patient'),
                'icon'        => 'icon-stethoscope',
                'permissions' => ['mohsin.mediscan.*'],
                'order'       => 500,
                'sideMenu' => [
                  'patient' => [
                      'label'       => 'Patients',
                      'icon'        => 'icon-wheelchair',
                      'url'         => Backend::url('mohsin/mediscan/patient'),
                      'permissions' => ['mohsin.mediscan.patients'],
                  ],
                  'scan' => [
                      'label'       => 'Scans',
                      'icon'        => 'icon-clipboard',
                      'url'         => Backend::url('mohsin/mediscan/scan'),
                      'permissions' => ['mohsin.mediscan.scans'],
                  ],
                  'prop' => [
                      'label'       => 'Props',
                      'icon'        => 'icon-list-alt',
                      'url'         => Backend::url('mohsin/mediscan/prop'),
                      'permissions' => ['mohsin.mediscan.props'],
                  ],
                ]
            ]
        ];
    }

}
