<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToProdutosTable extends Migration
{
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('link')->nullable(); // Adiciona o campo link
        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('link'); // Remove o campo link se necessário
        });
    }
}

