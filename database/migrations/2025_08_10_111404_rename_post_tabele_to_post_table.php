<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('post_tabele', 'post_table');
    }

    public function down(): void
    {
        Schema::rename('post_table', 'post_tabele');
    }
};
