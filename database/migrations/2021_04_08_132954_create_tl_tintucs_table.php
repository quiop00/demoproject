<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTlTintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tl_tintucs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images');
            $table->string('tieude');
            $table->string('mieuta');
            $table->string('noidung');
            $table->date('ngay');
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
        Schema::dropIfExists('tl_tintucs');
    }
}
