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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_number');
            $table->longText('footer_description');
            $table->string('country');
            $table->string('address');
            $table->string('email');
            $table->string('social');
            $table->longText('social_description');
            $table->longText('facebook');
            $table->longText('instagram');
            $table->longText('linkdin');
            $table->longText('behence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
