<?php

use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Fluent;
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
            $table->bigIncrements('id');
            $table->bigInteger('category')->unsigned();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('feature_image')->nullable();
            $table->boolean('status')->default(0);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('modified_by')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categorys')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
