<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('main_users', function (Blueprint $table) {
            $table->boolean('is_guest_user')->default(false)->after('id');
        });
    }

    public function down()
    {
        Schema::table('main_users', function (Blueprint $table) {
            $table->dropColumn('is_guest_user');
        });
    }
};
