<?php
    /**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.0
 *
 * function
 *
 * Created by ShineTheme
 *
 */

if(!defined('ST_TEXTDOMAIN'))
define ('ST_TEXTDOMAIN','traveler');

if(!defined('ST_TRAVELER_VERSION'))
define ('ST_TRAVELER_VERSION','1.1.9');

$status=load_theme_textdomain(ST_TEXTDOMAIN,get_template_directory().'/language');

get_template_part('inc/class.traveler');

st();
get_template_part('demo/demo_functions'); 



add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Complete Program' );		// Rename the description tab

	$tabs['additional_information']['title'] = __( 'Hotels Information' );	// Rename the additional information tab

	return $tabs;

}


/*
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Highlights', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>Highlights</h2>';
	echo '<p>Ÿ Tajmahal.<br>
Ÿ Boat ride in Varanasi.<br>
Ÿ Elephant ride in Jaipur.<br>
Ÿ Boat ride in Udaipur.<br>
Ÿ Eklingji & Nagda<br>
Ÿ Chittorgarh Fort<br>
Ÿ Dinner with an Indian Family in Agra (optional).<br></p>';
	
}

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'HOTELS', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>HOTELS</h2>';
        echo '<img src="http://unsplash.com/photos/iPrASCMwBKE/download" alt="hotel" height="42" width="42">';
	echo '<p>Hotel description</p>';
	
}
*/

  
add_filter( 'woocommerce_product_data_tabs', 'add_my_custom_product_data_tab' , 99 , 1 );
function add_my_custom_product_data_tab( $product_data_tabs ) {
    $product_data_tabs['my-custom-tab'] = array(
        'label' => __( 'My Custom Tab', 'my_text_domain' ),
        'target' => 'my_custom_product_data',
    );
    return $product_data_tabs;
}

add_action( 'woocommerce_product_data_panels', 'add_my_custom_product_data_fields' );
function add_my_custom_product_data_fields() {
    global $woocommerce, $post;

    ?>
    <!-- id below must match target registered in above add_my_custom_product_data_tab function -->
    <div id="my_custom_product_data" class="panel woocommerce_options_panel">
     
        <?php
     
        woocommerce_wp_checkbox( array( 
            'id'            => '_my_custom_field', 
            'wrapper_class' => 'show_if_simple', 
            'label'         => __( 'My Custom Field Label', 'my_text_domain' ),
            'description'   => __( 'My Custom Field Description', 'my_text_domain' ),
            'default'       => '0',
            'desc_tip'      => false,
        ) );
        ?>

    </div>

    <?php
}

add_action( 'woocommerce_process_product_meta', 'woocommerce_process_product_meta_fields_save' );
function woocommerce_process_product_meta_fields_save( $post_id ){
    // This is the case to save custom field data of checkbox. You have to do it as per your custom fields
    $woo_checkbox = isset( $_POST['_my_custom_field'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, '_my_custom_field', $woo_checkbox );
}