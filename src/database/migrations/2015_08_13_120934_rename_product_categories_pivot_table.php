<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProductCategoriesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function( Blueprint $table)
        {
            $table->renameColumn('product_id', 'products_id');
            $table->renameColumn('category_id', 'categories_id');
        });
        Schema::rename('product_categories', 'categories_products');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename( 'categories_products', 'product_categories');
        Schema::table('product_categories', function( Blueprint $table)
        {
            $table->renameColumn( 'products_id', 'product_id');
            $table->renameColumn( 'categories_id', 'category_id');
        });
    }
}
