<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->integer( 'depth' )->after('title')->default(1);
            $table->integer( 'parent' )->after('depth')->nullable()->default( null );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->enum( 'type', ['top', 'middle', 'bottom' ] )->after('title');
            $table->dropColumn('depth');
            $table->dropColumn('parent');
        });
    }
}
