<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });*/

        Schema::create('retribusiPemerintah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('nama');
            $table->string('jalan',1000);
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->date('tgl_lunas');
            $table->string('bulan');
            $table->string('tahun');
            $table->integer('status_cek');
            $table->timestamps();
        });

        Schema::create('retribusiSwasta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('nama');
            $table->string('jalan',1000);
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->date('tgl_lunas');
            $table->string('bulan');
            $table->string('tahun');
            $table->integer('status_cek');
            $table->timestamps();
        });

        Schema::create('tunggakanPemerintah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('nama');
            $table->string('jalan',1000);
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->integer('listrik');
            $table->integer('lbr_jalan');
            $table->integer('periode_tagih');
            $table->string('ketstatus');
            $table->date('tgl_lunas');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();
        });

        Schema::create('LunasPemerintah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('nama');
            $table->string('jalan',1000);
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->integer('listrik');
            $table->integer('lbr_jalan');
            $table->integer('periode_tagih');
            $table->string('ketstatus');
            $table->date('tgl_lunas');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();
        });

        Schema::create('tunggakanSwasta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('nama');
            $table->string('jalan',1000);
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->integer('listrik');
            $table->integer('lbr_jalan');
            $table->integer('periode_tagih');
            $table->string('ketstatus');
            $table->date('tgl_lunas');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();
        });

        Schema::create('lunasSwasta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('nama');
            $table->string('jalan',1000);
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->integer('listrik');
            $table->integer('lbr_jalan');
            $table->integer('periode_tagih');
            $table->string('ketstatus');
            $table->date('tgl_lunas');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();
        });

        Schema::create('grader', function (Blueprint $table) {
            $table->integer('statusPemerintah');
            $table->integer('statusSwasta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('retribusiPemerintah');
        Schema::drop('tunggakanPemerintah');
        Schema::drop('lunasPemerintah');
        Schema::drop('retribusiSwasta');
        Schema::drop('tunggakanSwasta');
        Schema::drop('lunasSwasta');
        Schema::drop('grader');
    }
}
