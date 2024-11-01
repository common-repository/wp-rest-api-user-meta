<?php
/**
 * Plugin Name:        WP REST API - User Meta
 * Plugin URI:         http://www.wpbdcoders.me/
 * Description:        This plugin include user meta into the WordPress REST API (v2) without additional API requests.
 *
 *
 * Author:             Ruhul Amin
 * Version:            1.0.0
 * Author URI:         http://www.ruhulamin.me/
 *
 * License:             GPL v3
 *
 * Text Domain:        WP REST API - User Meta
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 **/

if ( ! defined( 'WPINC' ) ) {
    die;
}

class bdcoders_usermeta_posts {

    public function __construct() {
        register_rest_field('post', 'author_meta', [
            'get_callback'    => array( $this, 'get_author_meta_details' ),
            'update_callback' => 'null',
            'schema'          => 'null',
        ]);
    }

    public function get_author_meta_details($object,$field_name,$request) {

        $user_data = get_userdata($object['author']); // get user data from author ID.

        $array_data = (array)($user_data->data); // object to array conversion.

        $array_data['first_name'] = get_user_meta($object['author'], 'first_name', true);
        $array_data['last_name']  = get_user_meta($object['author'], 'last_name', true);

        // prevent user enumeration.
        unset($array_data['user_login']);
        unset($array_data['user_pass']);
        unset($array_data['user_activation_key']);

        return array_filter($array_data);

    }
}

add_action('rest_api_init',function() {
    $bdcoders_usermeta_posts = new bdcoders_usermeta_posts;
});
