<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Agregar una nueva columna
function views_column($defaults) {
    $defaults['shortcode'] = 'Shortcode';
    return $defaults;
}
add_filter('manage_examenes_posts_columns', 'views_column');

function display_views($column_name) {
    if($column_name === 'shortcode') {
        $examen_id = get_the_ID();
                echo "[quizbook_examen preguntas='numero preguntas bisibles' orden='ordenamiento de las preguntas' id='$examen_id']";
    }
}
add_action('manage_examenes_posts_custom_column','display_views',5,2);
        