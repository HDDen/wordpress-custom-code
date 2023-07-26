<?php
/*
Plugin Name: HDDen custom code
Description: Выполнение кастомного кода
Version: 1.0
Author: HDDen
*/

class HDDenCustomCode
{
    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit','-1');
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $this->main();
    }

    private function main(){

        // добавляем страницу настроек
        add_action('admin_menu', function () {

            add_menu_page(
                'Кастомный код',
                'HDDen кастомный код',
                'manage_options',
                'hdden_custom_code',
                array($this, 'coreMenuItem'),
                'dashicons-admin-settings',
                90
            );

            add_submenu_page(
                'hdden_custom_code',
                'Первая операция',
                'Первая операция',
                'manage_options',
                'hdden_custom_code_first',
                array($this, 'firstProgram'),
            );


        });
    }

    // основной пункт меню
    public function coreMenuItem(){
        $result = 'Основа';
        
        ?>
        <div class="wrap">
            <h1>Выполнение кастомного кода</h1>
            <p>
                <?php
                    echo $result;
                ?>
            </p>
        </div>
        <?php
    }

    // дочерний пункт меню
    public function firstProgram(){

        $result = 'Первая прога';
        
        ?>
        <div class="wrap">
            <h1>Первый код</h1>
            <p>
                <?php echo $result; ?>
            </p>
        </div>
        <?php
    }

}
new HDDenCustomCode();