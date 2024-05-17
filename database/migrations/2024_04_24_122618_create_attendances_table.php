<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->date('tanggal');
            $table->time('masuk')->nullable();
            $table->time('pulang')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
