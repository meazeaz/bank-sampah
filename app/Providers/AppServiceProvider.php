<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Doctrine DBAL tidak mengenal tipe kolom "enum", sehingga CRUDBooster
        // gagal membaca skema tabel yang memakainya (mis. banners.type).
        // Petakan enum -> string supaya introspeksi skema tetap jalan.
        try {
            \Illuminate\Support\Facades\DB::getDoctrineSchemaManager()
                ->getDatabasePlatform()
                ->registerDoctrineTypeMapping('enum', 'string');
        } catch (\Exception $e) {
            // Abaikan bila koneksi database belum tersedia (mis. saat artisan jalan lebih dulu)
        }

        // Provide safe defaults for all CRUDBooster view variables that
        // PHP 8+ would throw "Undefined variable" errors for.
        \Illuminate\Support\Facades\View::composer('crudbooster::*', function ($view) {
            $module_name = '';
            $settingObj = new \stdClass();
            $settingObj->default_paper_size = 'A4';
            try {
                $module = \crocodicstudio\crudbooster\helpers\CRUDBooster::getCurrentModule();
                if ($module) {
                    $module_name = $module->name;
                }
                $paper_size = \crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('default_paper_size');
                if ($paper_size) {
                    $settingObj->default_paper_size = $paper_size;
                }
            } catch (\Exception $e) {}

            $defaults = [
                'setting'         => $settingObj,
                'module_name'     => $module_name,
                'sidebar_mode'    => '',
                'build_query'     => '',
                'page_icon'       => null,
                'page_title'      => null,
                'parent_table'    => null,
                'parent_field'    => null,
                'return_url'      => null,
                'button_show'     => true,
                'button_add'      => true,
                'button_edit'     => true,
                'button_delete'   => true,
                'button_detail'   => true,
                'button_filter'   => true,
                'button_export'   => false,
                'button_import'   => false,
                'button_addmore'  => true,
                'button_cancel'   => true,
                'button_save'     => true,
                'button_table_action' => true,
                'button_bulk_action'  => true,
                'button_selected' => [],
                'button_action_width' => null,
                'index_button'    => [],
                'index_statistic' => [],
                'index_additional_view' => [],
                'table_row_color' => [],
                'pre_index_html'  => null,
                'post_index_html' => null,
                'show_numbering'  => false,
                'alerts'          => [],
                'addaction'       => [],
                'load_js'         => [],
                'load_css'        => [],
                'script_js'       => null,
                'style_css'       => null,
                'sub_module'      => [],
                'parent_id'       => null,
                'pk'              => 'id',
                'table'           => null,
                'title_field'     => null,
                'appname'         => null,
                'hide_form'       => [],
                'forms'           => [],
            ];

            $existing = $view->getData();
            $shared = view()->getShared();
            foreach ($defaults as $key => $value) {
                if (!array_key_exists($key, $existing) && !array_key_exists($key, $shared)) {
                    $view->with($key, $value);
                }
            }
        });
    }
}
