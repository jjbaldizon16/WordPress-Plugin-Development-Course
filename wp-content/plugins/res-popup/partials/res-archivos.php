<?php
/**
 * Aqui encolaremos todos los arcvhivos css y js con sus clases en
 * la etiqueta body del front end al inspeccionar el elemento en el front end.
 */

 function enqueue_style( $hook ){

   if( $hook != 'toplevel_page_res_popup' ){

     return;

   }

   //Encolando css
   wp_enqueue_style(

      'admin-style',
      plugin_dir_url(__DIR__) . 'admin/css/app.css',
      [],
      '1.0.0',
      'all'

   );

   //Encolando la libreria de bootstrap
   wp_enqueue_style(

    'bootstrap-css',
    plugin_dir_url(__DIR__) . 'helpers/bootstrap-5.3.0/css/bootstrap.min.css',
    [],
    '5.3.0',
    'all'

 );

 wp_enqueue_style(

    'bootstrap-rtl.css',
    plugin_dir_url(__DIR__) . 'helpers/bootstrap-5.3.0/css/bootstrap.min.css',
    [],
    '5.3.0',
    'all'

 );


 }

 function enqueue_scripts( $hook ){

    if( $hook != 'toplevel_page_res_popup' ){
 
      return;
 
    }
 
  }

