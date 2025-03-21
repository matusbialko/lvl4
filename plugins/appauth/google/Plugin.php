<?php namespace AppAuth\Google;

use Backend;
use System\Classes\PluginBase;

/**
 * Google Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Google',
            'description' => 'No description provided yet...',
            'author'      => 'AppAuth',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'AppAuth\Google\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'appauth.google.some_permission' => [
                'tab' => 'Google',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'google' => [
                'label'       => 'Google',
                'url'         => Backend::url('appauth/google/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['appauth.google.*'],
                'order'       => 500,
            ],
        ];
    }
}
