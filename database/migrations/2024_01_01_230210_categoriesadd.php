<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function up()
     {
         Schema::table('articles', function ($table) {

              $table->text('image')->nullable()->change();// pour modifier une colonne

              $table->text('category');

         });
     }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
