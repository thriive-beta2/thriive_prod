<?php
add_filter('acf/fields/google_map/api', 'events_google_map_api');
add_filter('wpseo_breadcrumb_links', 'custom_wpseo_breadcrumb_output');
add_filter( 'get_the_archive_title','modify_category_title');
add_filter('wp_nav_menu_items', 'addLogoutLinkInNavigation', 10, 2);
add_filter('image_size_names_choose', 'custom_image_sizes_choose');
add_filter( 'send_password_change_email', '__return_false');
add_filter( 'gform_notification_2', 'add_attachment_pdf', 10, 3 ); //target form id 2, change to your form id
add_filter('wpseo_canonical' , 'change_cannonical_url', 10,1); //Filter to modify Canonical Url

// Adding ' lead form source' field  on user listing page
add_filter( 'manage_users_columns', 'add_new_user_column' );
add_filter( 'manage_users_custom_column', 'fill_new_user_column_value', 10, 3 );
add_filter('pre_get_users', 'filter_users_by_lead_form_source');
// For registering the column on therapist listing page backend
add_filter( 'manage_therapist_posts_columns', 'custom_posts_table_head' );
add_filter( 'page_row_actions', 'my_disable_quick_edit', 10, 2 );
?>