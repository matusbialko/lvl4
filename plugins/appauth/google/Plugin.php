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
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

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
        return []; // Remove this line to activate

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
        return []; // Remove this line to activate

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
