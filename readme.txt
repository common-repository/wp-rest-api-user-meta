=== Plugin Name ===
Contributors: ruhul105
Tags: wp-api, api, rest-api, author-meta, author-name, json, wp-json, rest api v2, Ruhul Amin, Ruhul Amin REST API
Requires at least: 4.4
Tested up to: 5.4.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin include author meta (name, display_name, first_name, last_name, user_email) into the WordPress REST API (v2) without additional API requests.

== Description ==

Now you have no need to make additional requests to get author info (name, display_name, first_name, last_name, user_email, user_registered date) from their id that is available in the default json response.

Now all these author data is available in 'author_meta' field from your json response.

For example in 'wp-json/wp/v2/posts' you can find default fields 'author' that contains only its id. With this plugin you can also find new 'author_meta' field that include details about author.

**Before:**
`{
	...
	author: 1
	...
}`

**After:**
`{
	...
	author_meta: {
		ID:"1",
        display_name:"admin",
        user_email:"demo@mail.com",
        user_nicename:"admin",
        user_registered:"2016-03-01 21:25:23"
	}
	...
}`


= Credits =

This plugin is created by <a href="https://www.linkedin.com/in/arruhulamin/" rel="friend" title="Ruhul Amin">Ruhul Amin</a>


== Installation ==

1. If your wordpress version below 4.7 then double check you have the WordPress REST (v2) API installed and active
2. Upload the plugin folder to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
3. Activate the plugin through the 'Plugins' screen in WordPress


== Changelog ==

= 1.0 =
* Initial release!
