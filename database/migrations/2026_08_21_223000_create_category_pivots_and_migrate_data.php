<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Create pivot table for tourism categories
        Schema::create('category_tourism', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tourism_id')->constrained('tourisms')->cascadeOnDelete();
            $table->primary(['category_id', 'tourism_id']);
        });

        // 2. Create pivot table for UMKM categories
        Schema::create('category_umkm', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('umkm_id')->constrained('umkms')->cascadeOnDelete();
            $table->primary(['category_id', 'umkm_id']);
        });

        // 3. Migrate existing category_id data into pivot tables
        if (Schema::hasColumn('tourisms', 'category_id')) {
            $tourisms = DB::table('tourisms')->whereNotNull('category_id')->get();
            foreach ($tourisms as $t) {
                DB::table('category_tourism')->insertOrIgnore([
                    'category_id' => $t->category_id,
                    'tourism_id' => $t->id,
                ]);
            }
        }

        if (Schema::hasColumn('umkms', 'category_id')) {
            $umkms = DB::table('umkms')->whereNotNull('category_id')->get();
            foreach ($umkms as $u) {
                DB::table('category_umkm')->insertOrIgnore([
                    'category_id' => $u->category_id,
                    'umkm_id' => $u->id,
                ]);
            }
        }

        // 4. Drop old foreign keys and columns
        Schema::table('tourisms', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::table('umkms', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }

    public function down(): void
    {
        Schema::table('tourisms', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('umkms', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
        });

        // Restore category_id from pivot if rolling back
        $pivotsTourism = DB::table('category_tourism')->get();
        foreach ($pivotsTourism as $pt) {
            DB::table('tourisms')->where('id', $pt->tourism_id)->update(['category_id' => $pt->category_id]);
        }

        $pivotsUmkm = DB::table('category_umkm')->get();
        foreach ($pivotsUmkm as $pu) {
            DB::table('umkms')->where('id', $pu->umkm_id)->update(['category_id' => $pu->category_id]);
        }

        Schema::dropIfExists('category_tourism');
        Schema::dropIfExists('category_umkm');
    }
};
