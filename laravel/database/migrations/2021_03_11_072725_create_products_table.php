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
            $table->timestamps();

            $table->string('name');
            $table->float('price');
            $table->text('details');
            $table->text('manual');
            $table->string('image');
        });

        DB::table('products')->insert([
            ['name' => 'Baum', 'price' => 29.3, 'details' => 'Ist ein guter Baum', 'manual' => 'Kann Luft machen', 'image' => 'image', ],
            ['name' => 'Blume', 'price' => 69, 'details' => 'Ist eine gute Blume', 'manual' => 'Kann Luft machen', 'image' => 'image', ],
            ['name' => 'Apfel', 'price' => 8.6, 'details' => 'Ist ein guter Apfel', 'manual' => 'Kann Luft machen', 'image' => 'image', ],
            ['name' => 'Birne', 'price' => 9.2, 'details' => 'Ist eine gute Birne', 'manual' => 'Kann Luft machen', 'image' => 'image', ],
            ['name' => 'Banane', 'price' => 2.5, 'details' => 'Ist eine gute Banane', 'manual' => 'Kann Luft machen', 'image' => 'image', ],
        ]);
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
