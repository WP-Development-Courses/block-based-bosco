=== Block-Based Bosco ===

Contributors: frank-klein
Tags: blog, featured-images
Requires at least: 5.6
Tested up to: 5.6
Requires PHP: 7.0
License: GNU General Public License v2.0 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Full-Site Editing experimental theme. Tested with Gutenberg 9.6.0

== Description ==

Block-Based Bosco is an experimental theme for the Full-Site Editing feature currently available in Gutenberg.

Development for this theme is done on GitHub: https://github.com/WP-Development-Courses/block-based-bosco

== Changelog ==

= 1.3 =

* Release date: 25 February 2021
* Tested with Gutenberg 10.0.2.
* Update text alignment attribute with new naming. See https://github.com/WordPress/gutenberg/pull/24077.
* Update `experimental-theme.json` to the new structure. See https://github.com/WordPress/gutenberg/pull/28110.
* Refactor removal of Author block frontend styles.
* Remove unneeded code only present to pass Theme Check. This includes the comments, as well as footer and header template.

= 1.2 =

* Release date: 18 January 2021
* Tested with Gutenberg 9.7.4.
* Update theme tags to mark the theme ass Full-Site Editing compatible.
* Use block attributes to align blocks instead of CSS.
* Implement Global Styles for colors, typography, and block settings.
* Update Query Block settings in `index.html` to inherit the Main Query.
* Clean up and adjust CSS to work with the Global Styles.
* Remove `RequireGutenberg` class in favor of the Gutenberg admin notice.
* Added comments support to single posts and pages.

= 1.1 =

* Release date: 26 November 2020
* Addressed theme review feedback:
   * Updated screenshot.
   * Added licensing information for `normalize.css`.
   * Aligned function prefix with the theme slug, to be more unique.
   * Updated editor styles for Gutenberg 9.4.

= 1.0 =

* Release date: 5 November 2020

== Resources ==
* Normalize.css: https://github.com/necolas/normalize.css licensed under MIT.
