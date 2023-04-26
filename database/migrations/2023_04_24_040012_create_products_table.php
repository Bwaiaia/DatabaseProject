<?php

  

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

  

class CreateProductsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->string('fullname');

            $table->string('passport_num');

            $table->string('passport_type');

            $table->string('issue_date');

            $table->string('expiry_date');

            $table->text('detail');

            $table->string('image');

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

        Schema::dropIfExists('products');

    }

}
