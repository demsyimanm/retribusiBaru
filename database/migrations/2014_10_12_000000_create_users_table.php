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
        S/*chema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });*/
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nama');
            $table->string('jalan');
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('rp_retribusi');
            $table->integer('retribusi');
            $table->integer('listrik');
            $table->float('lbr_jalan');
            $table->string('kategori');
            $table->integer('status_aktif');
            $table->timestamps();
        });

        Schema::create('pelanggan_baru', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nama');
            $table->string('jalan');
            $table->string('gang');
            $table->string('nomor');
            $table->string('notamb');
            $table->string('da');
            $table->string('kd_tarif');
            $table->integer('rp_retribusi');
            $table->integer('retribusi');
            $table->integer('listrik');
            $table->float('lbr_jalan');
            $table->string('kategori');
            $table->string('bln_daftar');
            $table->string('thn_daftar');
            $table->timestamps();
        });

        Schema::create('retribusi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->string('bln_retribusi');
            $table->string('thn_retribusi');
            $table->string('kd_tarif');
            $table->integer('retribusi');
            $table->date('tgl_lunas');
            $table->integer('status_cek');
            $table->timestamps();
        });

        Schema::create('tunggakan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id');
            $table->integer('periode_tagih');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('difference', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retribusi_id');
            $table->integer('pelanggan_id');
            $table->integer('keterangan');
            $table->timestamps();
        });

        Schema::create('grader', function (Blueprint $table) {
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('difference');
        Schema::drop('pelanggan');
        Schema::drop('pelanggan_baru');
        Schema::drop('retribusi');
        Schema::drop('tunggakan');
        Schema::drop('grader');
    }
}
