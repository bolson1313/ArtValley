<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if(!Schema::hasColumn('users', 'surname')) {
                $table->after('name', function (Blueprint $table) {
                    $table->string('surname')->nullable();
                });
            }
        });
        Schema::table('users', function (Blueprint $table) {
            if(!Schema::hasColumn('users', 'nickname')) {
                $table->after('surname', function (Blueprint $table) {
                    $table->string('nickname')->nullable();
                });
            }
        });
        Schema::table('users', function (Blueprint $table) {
            if(!Schema::hasColumn('users', 'avatar')) {
                $table->after('nickname', function (Blueprint $table) {
                    $table->string('avatar')->nullable();
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
