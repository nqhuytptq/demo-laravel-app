<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSttColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giao_vien', function (Blueprint $table) {
            $table->integer('status')->after('dia_chi')->default(1);
        });
        Schema::table('mon_hoc', function (Blueprint $table) {
            $table->integer('status')->after('ten_mon')->default(1);
        });
        Schema::table('lop', function (Blueprint $table) {
            $table->integer('status')->after('nam_hoc')->default(1);
        });
        Schema::table('loai_kiem_tra', function (Blueprint $table) {
            $table->integer('status')->after('he_so')->default(1);
        });
        Schema::table('giang_day', function (Blueprint $table) {
            $table->integer('status')->after('nam_hoc')->default(1);
        });
        Schema::table('khoi', function (Blueprint $table) {
            $table->integer('status')->after('ten_khoi')->default(1);
        });
        Schema::table('hoc_sinh_lop', function (Blueprint $table) {
            $table->integer('status')->after('nam_hoc')->default(1);
        });
        Schema::table('khoi_mon', function (Blueprint $table) {
            $table->integer('status')->after('mon_id')->default(1);
        });
        Schema::table('diem', function (Blueprint $table) {
            $table->integer('status')->after('diem')->default(1);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stt_column');
    }
}
