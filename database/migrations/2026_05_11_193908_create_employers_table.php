<?php

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->foreignIdFor(User::class)
                ->nullable()->constrained();

            $table->timestamps();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignIdFor(Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Note to self - also drop the column that has a foreign id relationship,  
            // even though it may sound illogical since you're dropping ForeignIdFor a certain class, laravel still demands you delete the column 
            $table->dropForeign(['employer_id']);
            $table->dropForeignIdFor(Employer::class);
        });

        Schema::dropIfExists('employers');
    }
};
