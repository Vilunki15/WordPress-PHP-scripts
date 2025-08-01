<?php
//If you want to show all child categories of the show'n category,
//This adds a shortcode that shows categories
//<?php is only for highlighting

function show_child_product_categories() {
    if ( ! is_product_category() ) return '';

    $term = get_queried_object();
    if ( ! $term instanceof WP_Term ) return '';

    $args = array(
        'taxonomy'     => 'product_cat',
        'parent'       => $term->term_id,
        'hide_empty'   => false,
    );

    $terms = get_terms( $args );

    if ( empty( $terms ) ) return '';

    $output = '<div class="child-categories-grid" style="display: flex; flex-wrap: wrap; gap: 20px;">';

    foreach ( $terms as $child ) {
        $thumbnail_id = get_term_meta( $child->term_id, 'thumbnail_id', true );
        $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();

        $output .= '<div class="child-category" style="text-align: center; width: 200px;">';
        $output .= '<a href="' . esc_url( get_term_link( $child ) ) . '">';
        $output .= '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $child->name ) . '" style="width:100%; height:auto;"/>';
        $output .= '<h3>' . esc_html( $child->name ) . '</h3>';
        $output .= '</a>';
        $output .= '</div>';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode( 'child_categories', 'show_child_product_categories' );
