<?php 

/**
 * Creando el menú pop-up
 */

if( !function_exists( 'res_menu_popup' ) ){

    function res_menu_popup(){

        add_menu_page(
            'Menú Pop-Up',
            'Menú Pop-Up',
            'manage_options',
            'res_popup',
            'res_options_menu_popup',
            'dashicons-megaphone',
            12
        );

    }
    add_action('admin_menu', 'res_menu_popup');

}

//Función callback
if( !function_exists('res_options_menu_popup') ){

    function res_options_menu_popup(){

       // $nombre = $_GET['edit'];
       // $id = $_GET['id'];

        if( !isset($_GET['edit']) && !isset($_GET['id']) ){
            include plugin_dir_path( __DIR__ ) . 'admin/res-display-menu.php';

            

        }else{

            include plugin_dir_path( __DIR__ ) . 'admin/res-display-menu-edit.php';

        }

        

    }

}