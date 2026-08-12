<?php
// database/migrations/2026_07_12_035122_create_banners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('link')->nullable();
            $table->enum('type', ['landscape', 'square'])->default('landscape');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Seed 4 dummy banners
        $now = now();
        DB::table('banners')->insert([
            [
                'title' => 'Pelatihan Pengomposan & Budidaya Maggot BSF',
                'image' => 'images/banner-pelatihan-kompos.png',
                'link' => '#',
                'type' => 'landscape',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Pelatihan Kerajinan Daur Ulang Kreatif',
                'image' => 'images/banner-pelatihan-kerajinan.png',
                'link' => '#',
                'type' => 'landscape',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Ajak Teman, Raih Poin!',
                'image' => 'images/banner-square-referral.png',
                'link' => '#',
                'type' => 'square',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Tukar Sampah Jadi Emas!',
                'image' => 'images/banner-square-emas.png',
                'link' => '#',
                'type' => 'square',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);

        // Register module in CRUDBooster cms_moduls
        $moduleId = DB::table('cms_moduls')->insertGetId([
            'id' => 33,
            'name' => 'Banner Iklan',
            'icon' => 'fa fa-image',
            'path' => 'banners',
            'table_name' => 'banners',
            'controller' => 'AdminBannersController',
            'is_protected' => 0,
            'is_active' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        // Register menu in CRUDBooster cms_menus
        $menuId = DB::table('cms_menus')->insertGetId([
            'id' => 34,
            'name' => 'Banner Iklan',
            'type' => 'Route',
            'path' => 'AdminBannersControllerGetIndex',
            'color' => 'normal',
            'icon' => 'fa fa-image',
            'parent_id' => 0,
            'is_active' => 1,
            'is_dashboard' => 0,
            'id_cms_privileges' => 1,
            'sorting' => 10,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        // Link menu privilege (Superadmin ID = 1)
        DB::table('cms_menus_privileges')->insert([
            'id_cms_menus' => 34,
            'id_cms_privileges' => 1
        ]);

        // Add privilege roles for the new module (Superadmin ID = 1)
        DB::table('cms_privileges_roles')->insert([
            'id' => 63,
            'is_visible' => 1,
            'is_create' => 1,
            'is_read' => 1,
            'is_edit' => 1,
            'is_delete' => 1,
            'id_cms_privileges' => 1,
            'id_cms_moduls' => 33,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('cms_privileges_roles')->where('id_cms_moduls', 33)->delete();
        DB::table('cms_menus_privileges')->where('id_cms_menus', 34)->delete();
        DB::table('cms_menus')->where('id', 34)->delete();
        DB::table('cms_moduls')->where('id', 33)->delete();
        
        Schema::dropIfExists('banners');
    }
}
