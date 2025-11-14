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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name");
            $table->string("capital");
            $table->string("passport_validity");
            $table->string("phone_code");
            $table->string("timezone");
            $table->unsignedBigInteger("population");
            $table->unsignedBigInteger("area_km2");
            $table->string("embassy_url");
            $table->string("registration")->nullable();
            $table->string("registration_url")->nullable();
            $table->string("primary_rule")->nullable();
            $table->string("primary_rule_duration")->nullable();
            $table->string("secondary_rule")->nullable();
            $table->string("secondary_rule_duration")->nullable();
            $table->unsignedBigInteger("continent_id");
            $table->unsignedBigInteger("currency_id");

            $table->foreign("currency_id")->references("id")->on("currencies")->onDelete("cascade");
            $table->foreign("continent_id")->references("id")->on("continents")->onDelete("cascade");;
                        
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('sessions');
    }
};


