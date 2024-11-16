<?php namespace AppAuth\Auth;

use Backend;
use System\Classes\PluginBase;

/**
 * Auth Plugin Information File
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
            'name'        => 'Auth',
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
            'AppAuth\Auth\Components\MyComponent' => 'myComponent',
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
            'appauth.auth.some_permission' => [
                'tab' => 'Auth',
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
            'auth' => [
                'label'       => 'Auth',
                'url'         => Backend::url('appauth/auth/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['appauth.auth.*'],
                'order'       => 500,
            ],
        ];
    }
}
