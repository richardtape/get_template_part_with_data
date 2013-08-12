=== Get Template Part With Data ===
Contributors: Richard Tape, BRITEWEB
Tags: template, theme, part, data
Donate Link: https://www.charitywater.org/donate/
Requires at least: 3.0.0
Tested up to: 3.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a function to enable theme authors to pass data to a template part when calling.

== Description ==

This is a plugin for theme developers. It doesn't add an special doodads or whizzbangs. What it does add is a simple
way for a template file or function to pass data to a template part.

= Source Repository on GitHub =
https://github.com/iamfriendly/get_template_part_with_data

= Bugs, Questions or Suggestions =
https://github.com/iamfriendly/get_template_part_with_data/issues

= Usage =

`$data = 'Something to pass to the template part';`
`$more_data = array( 'some' => 'thing', 'foo' => 'bar' );`

`get_template_part_with_data( 'templates/parts/loop', 'main', array( 'data' => $data, 'more_data' => $more_data ) );`

Then, in your theme's `template/parts/loop-main.php` file you use

`global $template_data;`
`$data = $template_data['data'];`
`$more_data = $template_data['more_data'];`

== Installation ==

1. Upload `get-template-part-with-data.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. See 'Usage' to know what to do in your theme

== Screenshots ==

None.

== Frequently Asked Questions ==

None as of yet. But feel free to ask away at https://github.com/iamfriendly/get_template_part_with_data/issues

== Changelog ==

= 1.0.0 =
* Initial Release.


== Upgrade Notice ==

None.