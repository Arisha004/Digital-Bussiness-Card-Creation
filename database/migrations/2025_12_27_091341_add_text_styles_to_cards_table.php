<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('business_cards', function (Blueprint $table) {
        $table->string('font_family')->default('Poppins');
        $table->string('text_align')->default('center');
        $table->string('font_size')->default('16px');
        $table->boolean('is_bold')->default(false);
        $table->boolean('is_italic')->default(false);
    });
}

public function down()
{
    Schema::table('business_cards', function (Blueprint $table) {
        $table->dropColumn([
            'font_family',
            'text_align',
            'font_size',
            'is_bold',
            'is_italic',
        ]);
    });
}

};

    
