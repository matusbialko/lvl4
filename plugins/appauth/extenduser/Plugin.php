<?php namespace AppAuth\ExtendUser;

use Backend;
use System\Classes\PluginBase;
use AppAuth\ExtendUser\Models\ExtendUser;

/**
 * ExtendUser Plugin Information File
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
            'name'        => 'ExtendUser',
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
            'AppAuth\ExtendUser\Components\MyComponent' => 'myComponent',
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
            'appauth.extenduser.some_permission' => [
                'tab' => 'ExtendUser',
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
            'extenduser' => [
                'label'       => 'ExtendUser',
                'url'         => Backend::url('appauth/extenduser/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['appauth.extenduser.*'],
                'order'       => 500,
            ],
        ];
    }
}
