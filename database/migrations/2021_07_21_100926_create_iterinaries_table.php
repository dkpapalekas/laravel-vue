<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIterinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iterinaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->integer('km_tracker');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iterinaries', function (Blueprint $table) {
            if (Schema::hasColumn('iterinaries', 'user_id'))
            {
                $table->dropForeign('iterinaries_user_id_foreign');
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('iterinaries', 'vehicle_id'))
            {
                $table->dropForeign('iterinaries_vehicle_id_foreign');
                $table->dropColumn('vehicle_id');
            }

            $table->dropIfExists('iterinaries');
        });
    }
}
