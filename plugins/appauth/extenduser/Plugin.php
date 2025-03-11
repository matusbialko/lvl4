<?php namespace AppAuth\ExtendUser;

use Backend;
use System\Classes\PluginBase;
use AppAuth\ExtendUser\Models\ExtendUser;
use RainLab\User\Controllers\Users as UsersController;

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
        ExtendUser::extend(function ($model) {
            $model->addFillable([
                'google_token',
                'google_refresh_token',
                'slack_id',
                'slack_webhook_url',
            ]);
        });
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
        return []; // Remove this line to activate

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
        return []; // Remove this line to activate

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
