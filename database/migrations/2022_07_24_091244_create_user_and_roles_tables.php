<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('role_id')->constrained();
            $table->string('reason')->nullable();
        });

        \App\Models\User::factory()->create([
            'name' => 'muath',
            'email' => 'muath@test.test',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('roles_users');
    }
};
