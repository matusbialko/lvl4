<?php namespace AppAuth\ExtendUser\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddAuthFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('google_token')->nullable();
            $table->string('google_refresh_token')->nullable();
            $table->string('slack_id')->nullable();
            $table->string('slack_webhook_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            if (Schema::hasColumn('users', 'google_token')) {
                $table->dropColumn('google_token');
            }
            if (Schema::hasColumn('users', 'google_refresh_token')) {
                $table->dropColumn('google_refresh_token');
            }
            if (Schema::hasColumn('users', 'slack_id')) {
                $table->dropColumn('slack_id');
            }
            if (Schema::hasColumn('users', 'slack_webhook_url')) {
                $table->dropColumn('slack_webhook_url');
            }
        });
    }
}
