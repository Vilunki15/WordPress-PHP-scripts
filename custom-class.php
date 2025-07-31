//Sometimes you need custom classes for the body element
//This adds custom classes for WP pages (e.g., my account page)

add_filter('body_class', function($classes) {
    if (is_account_page()) {
        $classes[] = 'custom-my-account-page';
    }
    return $classes;
});
