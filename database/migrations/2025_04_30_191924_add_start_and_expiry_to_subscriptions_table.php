<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('subscriptions', function (Blueprint $table) {
        $table->timestamp('started_at')->nullable();
        $table->timestamp('expires_at')->nullable();
    });
}

public function down()
{
    Schema::table('subscriptions', function (Blueprint $table) {
        $table->dropColumn(['started_at', 'expires_at']);
    });
}
};
