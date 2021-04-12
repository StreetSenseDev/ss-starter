# QuallsBenson Starter Theme

Version: 1.2.2

## Author:

John Hanusek ( [@hanusek](http://twitter.com/hanusek) / [quallsbenson.com](http://quallsbenson.com) / [hanusek.com](http://hanusek.com) )

## Summary

WordPress Starter Theme for use as a starting template for building custom themes. Uses SCSS, HTML5 Boilerplate, WP Gutenberg and Webpack / Laravel Mix for all processing tasks. Tailwind and PurgeCSS added for good measure. Syncs changes across local development devices with BrowserSync. Tested up to WordPress 4.0 RC1.

## Usage

The theme is setup to use [Laravel Mix](https://laravel.com/docs/8.x/mix) to compile SCSS (with source maps), run it through [browserSync](https://github.com/ai/autoprefixer), lint, concatenate and minify JavaScript (with source maps), optimize images, and syncs changes across local development devices with [BrowserSync](https://github.com/shakyShane/browser-sync), with flexibility to add any additional tasks via the webpack.mix.js. 

Rename folder to your theme name, search and reaplce `qb-starter` witht he name of your choice. Open the theme directory in terminal and run `npm install` to pull in all package dependencies. Run `npm run dev` to execute development. Code as you will.


### Deployment

Run `npm run prod` to execute development. Code as you will.

### Features

1. Normalized stylesheet for cross-browser compatibility using Normalize.css version 3 (IE8+)
2. Easy to customize
3. Flexible grid based on work from [Chris Coyier](https://twitter.com/chriscoyier)
4. Media Queries can be nested in each selector using SASS
5. SCSS with plenty of mixins ready to go
6. Grunt for processing all SASS, JavaScript and images, and cross-device refreshing with BrowserSync
7. Much much more

### Suggested Plugins

* [WordPress SEO by Yoast](http://wordpress.org/extend/plugins/wordpress-seo/)
* [Google Analytics for WordPress by Yoast](http://wordpress.org/extend/plugins/google-analytics-for-wordpress/)
* [W3 Total Cache](http://wordpress.org/extend/plugins/w3-total-cache/)

### Contributing:

Anyone and everyone is welcome to contribute! Check out the [Contributing Guidelines](CONTRIBUTING.md).

### Contributors:

- [jcnh74](https://github.com/jcnh74)

### Credits

Without these projects, this WordPress Starter Theme wouldn't be where it is today.

* [SASS / SCSS](http://sass-lang.com/)
* [BrowserSync](https://github.com/shakyShane/browser-sync)

TBD
