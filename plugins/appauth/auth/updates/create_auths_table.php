<?php namespace AppAuth\Auth\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAuthsTable extends Migration
{
    public function up()
    {
        Schema::create('appauth_auth_auths', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appauth_auth_auths');
    }
}
