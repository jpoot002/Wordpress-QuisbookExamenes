<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
Plugin Name:Quisbook-examenes
Plugin URI:
Description: Puglin para añadir Quizbook o preguntas
Version: 1.1
Author: jesus alfredo poot canche 
Author URI:
License: GPL2
License URL: https://www.gnu.org/license/gpl-2.0.thml
Text Domain: Quizbook
*/

function quizbook_examen_revisar() {
    if(!function_exists( 'quizbook_post_type' ) ) {
        deactivate_plugins(plugin_basename(__FILE__));       
        add_action( 'admin_notices', 'quizbook_error_activar' );
    } 
}
add_action('admin_init', 'quizbook_examen_revisar');

function quizbook_error_activar() {
    $class = 'notice notice-error';
    $message = __( 'Un Error ocurrió! Necesitas Instalar el Plugin Quizbook.', 'sample-text-domain' );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}
    
/*
* Registrar Post Types a Quizbook Examen
*/
require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
register_activation_hook(__FILE__, 'quizbook_examenes_rewrite_flush'); 

/*
 * Agrega Roles y Permisos a Quizbook Examen
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/roles.php';
register_activation_hook( __FILE__, 'quizbook_examenes_agregar_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_examenes_remover_capabilities' );

/*
* Añade metaboxes a Quizbook Examen
*/
require_once plugin_dir_path( __FILE__ ) . 'includes/metaboxes.php';

/*
* Añade js y css a  Quizbook Examen
*/
require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';

/*
* Añade shortcode para examen id
*/
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

/*
* Añade coluna en el campo de registro para el shortcode
*/
require_once plugin_dir_path(__FILE__) . 'includes/columnas.php';

