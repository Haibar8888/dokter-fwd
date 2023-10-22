<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permision_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permision_id')->nullable()->index('fk_permision_role_to_permision');
            $table->foreignId('role_id')->nullable()->index('fk_permision_role_to_role');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permision_role');
    }
}
