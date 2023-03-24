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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('subsubcategory_id')->nullable();
            $table->string('product_name_en');
            $table->string('product_name_bn');
            $table->string('product_slug_en');
            $table->string('product_slug_bn');
            $table->string('product_tags_en');
            $table->string('product_tags_bn');
            $table->string('product_title_en');
            $table->string('product_title_bn');
            $table->text('product_desc_en');
            $table->text('product_desc_bn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_bn')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_bn')->nullable();
            $table->string('product_code');
            $table->integer('product_qty');
            $table->integer('selling_price');
            $table->integer('discount_price')->nullable();
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('spacial_offer')->nullable();
            $table->integer('spacial_deals')->nullable();
            $table->integer('status')->default(1)->comment('active is  1');
            $table->foreign('category_id')->references('id')->on('categories') ->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories') ->onDelete('cascade');
            $table->foreign('subsubcategory_id')->references('id')->on('sub_sub_categories') ->onDelete('cascade');
            $table->softDeletes();
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
