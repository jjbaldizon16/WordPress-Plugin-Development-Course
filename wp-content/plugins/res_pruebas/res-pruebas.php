<?php
/**
 * Plugin Name: Pruebas
 * Plugin Uri: https://thewparchitect.com/
 * Description: Este es un plugin de Pruebas.
 * Version: 1.0.0
 * Requires PHP: 7.0
 * Author: The WP Arquitect
 * Author Uri: https://www.linkedin.com/in/josue-baldizon-4b1830131/
 * License: GPL V2
 * License Uri: https://wwww.gmu.org/licenses/gpl-2.0.html
 * Text Domain: Pruebas
 * Domain Path: /languages
 */


 
 

 function res_desactivacion() {

    //Accion
    //flush_rewrite_rules();


 }
 register_deactivation_hook(__FILE__, 'res_desactivacion');

 

if( !isset( $mivariable ) ){

   $mivariable = "Nuevo valor";


}


if( !function_exists( 'res_install' ) ){

   function res_install(){

  //Accion
  require_once 'activador.php';
  
  
   }

   register_activation_hook( __FILE__, 'res_install' );

}

if( !class_exists( 'RES_MI_Class' ) ){

   class RES_MI_Class{


   }


}

if( !function_exists( 'res_plugins_cargados' ) ){

   function res_plugins_cargados(){

     if( current_user_can( 'edit_pages' ) ){

         if( !function_exists( 'add_meta_description' ) ){

          function add_meta_description(){

            echo "<meta name='description' content='Creacion de plugins de WordPress'>";
              

          } 

          add_action( 'wp_head', 'add_meta_description' );


         }


     }

   }

   add_action( 'plugins_loaded', 'res_plugins_cargados' );

}

if( !function_exists( 'res_prueba_nonce' ) ){


   function res_prueba_nonce(){

       add_menu_page(
           'RES Prueba Nonce',
           'RES Prueba Nonce',
           'manage_options',
           'res_pruebas_nonce',
           'res_pruebas_page_display',
           'dashicons-welcome-learn-more',
           '15'

       );

        remove_menu_page('res_pruebas_nonce');

   }

  add_action( 'admin_menu', 'res_prueba_nonce' );

  


}


if( !function_exists( 'res_pruebas_page_display' ) ){

   function res_pruebas_page_display(){

     if( current_user_can( 'edit_others_posts' ) ){

        $nonce = wp_create_nonce( 'mi_nonce_de_seguridad' );

             echo "<br> $nonce <br>";

             if( isset( $_POST['nonce'] ) && !empty( $_POST['nonce'] ) ){

               if( wp_verify_nonce( $_POST['nonce'], 'mi_nonce_de_seguridad' ) ){

                  echo "Hemos verificado correctamente el nonce recibido <br> Nonce : {$_POST['nonce']} <br>";
                



               }else{

                  echo "El nonce no fue recibido o no es correcto";

               }

             }

        
      ?>

      <br>
      <form action="" method="post">

         <input type="hidden" name="nonce" value="<?php echo $nonce; ?>">

         <input type="hidden" name="eliminar" value="eliminar">

         <button type="submit">Eliminar</button>

      </form>

      <?php

     }   

   
    } 

} 



if( !function_exists( 'res_options_page' ) ){
   function res_options_page(){
   add_menu_page(
   'RES Opciones de Página',
   'RES Opciones de Página',
   'manage_options',
   'res_options_page',
   'res_options_page_display',
   //ruta raíz del plugin
   plugin_dir_url( __FILE__ ) . 'img/icono_personalizado.png',
   '15'
   );

     add_submenu_page(
        'res_options_page',
        'Submenu 1',
        'Submenu 1',
        'manage_options',
        'res_submenu1_pruebas',
        'res_submenu1_pruebas_display'    
        


     );

   }
   add_action( 'admin_menu', 'res_options_page' );

}


if( !function_exists( 'res_options_page_display' ) ){
   function res_options_page_display(){
   ?>
   <!--html-->
   <div class="wrap">
   <form action="" method="post">
   <input type="text" placeholder="Texto" name="" id="">
   <?php do_action('res_extend_form'); ?>


   <?php submit_button( 'Enviar' ); ?>
   </form>
   </div>
   <?php
   }
  }


function res_anadir_campos_nuevos(){

 ?>

  <input type="text" name="" id="" placeholder="Apellidos">

 <?php

}

add_action( 'res_extend_form', 'res_anadir_campos_nuevos' );

if( !function_exists( 'res_submenu1_pruebas_display' ) ){

function res_submenu1_pruebas_display(){
       
   ?>

   <!--html-->

   <div class="wrap">

   <h3>Bienvenido a la pagina submenu</h3>

   </div>

   <?php

}

}



//Funcion eliminar widget

function miprimerafuncion(){

 unregister_widget( 'WP_Widget_Calendar' );

}

add_action( 'widgets_init', 'miprimerafuncion' );

//Funcion para enviar email al crear un post

function function_callback_save_post( $post_id, $post ){
   if( wp_is_post_revision( $post_id ) ){
   return;
   }
   $autor_id = $post->post_author;
   $name_autor = get_the_author_meta( 'display_name', $autor_id );
   $email_autor = get_the_author_meta( 'user_email', $autor_id );
   $title = $post->post_title;
   $permalink = get_permalink( $post_id );
   //Datos para el email
   $para = sprintf( '%s', $email_autor );
   $asunto = sprintf( 'Publicación guardada: %s', $title );
   $mensaje = sprintf( 'Felicitaciones, %s! su publicación "%s" ha sido
  guardada,
   puede verlo en el siguiente enlace: %s', $name_autor, $title, $permalink );
   $headers[] = 'From: "' . $name_autor . '" < ' . get_option('admin_ema
  il') . ' >';
   wp_mail( $para, $asunto, $mensaje, $headers );
  }
  add_action( 'save_post', 'function_callback_save_post', 10, 2 );


  function atr_modificar_texto($texto){
   //El texto de Read More… se va a sustituir por la cadena que devuelva s en esta función
  
   $texto="...";
   return $texto;
  }
  add_filter('excerpt_more','atr_modificar_texto');

  //Funcion shortcode

  function res_primer_shortcode( $atts, $content = null ){
   return '<h3 class="title">' . $content . '</h3>';
  }
  add_shortcode( 'res_texto', 'res_primer_shortcode' );

  //Shortcode complejo
  function res_shortcode_link_personalizado( $atts, $contenido = null ){
   $attr_default = array(
   'texto' => 'ver más información',
   'class' => 'btn btn-primary',
   'url' => '#',
   'target' => '_blank'
   );
   $atts = array_change_key_case( (array)$atts, CASE_LOWER );
   //Convierte los objetos del array en variables
   extract( shortcode_atts( $attr_default, $atts, 'reslink'), EXTR_OVERWRITE );
  
   return "
   <a href='$url' class='$class' target='$target'>
   $contenido
   </a>
   ";
  }
  add_shortcode( 'reslink', 'res_shortcode_link_personalizado' );

 //Funcion para remover el shortcode
 
  remove_shortcode( 'reslink' );

  function filter_the_content_in_the_main_loop( $content ){

   if( ( is_singular( 'post' ) ) && in_the_loop()  && is_main_query() ){

   if( is_single( 'entrada-shortcode' ) && ! shortcode_exists('reslink') ){

        return $content . "
           <div class='alert alert-danger' role='alert'>" .
             
             esc_html__('shortcode no existe', 'res-pruebas') .    
            
           "</div>" .           
 

        "";

   }

   }
    
    return $content;

  }

  add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );

  function res_function_setting(){

     //Registrando una nueva funcion en la pagina general(ajustes/generales)

     register_setting( 'general', 'res_primera_configuracion' );
     //Añadir secccion
     add_settings_section(

          'res_config_seccion',
          'Mi primera configuracion',
          'res_config_seccion_cb',
          'general'

     );
      //Añadir campos
      add_settings_field(
          'res_config_campo1',
          'Configuracion Campo 1',
          'res_config_campo_cb1',//Identificador del campo 01(function res_config_campo_cb1( $args )) que esta abajo en las funciones callback.
          'general',
          'res_config_seccion', 
          array(
               'label_for' => 'res_campo_1',
               'class' => 'clase_campo',
               'res_dato_personalizado' => 'valor_personalizado'

          )

      );

      add_settings_field(
         'res_config_campo2',
         'Configuracion Campo 2 Apellidos(Ejemplo)',
         'res_config_campo_cb2',//Identificador del campo 02(function res_config_campo_cb2( $args )) que esta abajo en las funciones callback.
         'general',
         'res_config_seccion',
         array(
            'label_for' => 'res_campo_2',
            'class' => 'clase_campo',
            'res_dato_personalizado' => 'valor_personalizado'

       ) 


     );

  }

  add_action( 'admin_init', 'res_function_setting' );

  //Funciones callback
  
  //Funcion callback seccion
  function res_config_seccion_cb(){

    echo "<p>Mi primer Ajuste de configuracion</p>";
  


  }

  //Funcion callback campo 1

  function res_config_campo_cb1( $args ){

    $resconfig = get_option( 'res_primera_configuracion' );
    $valor = isset( $resconfig[$args['label_for']]) ? esc_attr( $resconfig[$args['label_for']]) : '';
    $html = "<input class='{$args['class']}' type='text' data-custom='{$args['res_dato_personalizado']}' 
    name='res_primera_configuracion[{$args['label_for']}]' value='$valor'>";
    echo $html;

  }

  //Funcion callback campo 2

  function res_config_campo_cb2( $args ){

   $resconfig = get_option( 'res_primera_configuracion' );
   $valor = isset( $resconfig[$args['label_for']]) ? esc_attr( $resconfig[$args['label_for']]) : '';
   $html = "<input class='{$args['class']}' type='text' data-custom='{$args['res_dato_personalizado']}' 
   name='res_primera_configuracion[{$args['label_for']}]' value='$valor'>";
   echo $html;

 }

 /*$valor = 'Color rojo';
 //add_option('atr_valor_personalizado_01', $valor);

 $valor = [
   'Manchester City',
   'Real Madrid',
   'Bayern Munich',
   'Titulo' => 'Equipos de futbol'
  ];
  //add_option('atr_valor_personalizado_02', $valor);

  $opcion_personalizada = get_option( 'atr_valor_personalizado_01' );

  echo "$opcion_personalizada <br>";

  $opcion_personalizada2 = get_option( 'atr_valor_personalizado_02' );

  //var_dump( $opcion_personalizada2 );

  $valor_nuevo = "Este es un nuevo valor";
  update_option( 'atr_valor_personalizado_01', $valor_nuevo );

  delete_option( 'atr_valor_personalizado_02' );
  delete_option( 'atr_valor_personalizado_01' );*/

  //Soy una persona Exitosa.


  $variable = "Esto es una variable";


  






 