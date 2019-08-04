<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);

        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);
        DB::table('features')->insert([
            'name'          =>  Str::random(15),
            'created_at'    =>  \Carbon\Carbon::now(),
            'updated_at'    =>  \Carbon\Carbon::now(),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
