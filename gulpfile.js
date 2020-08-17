// GULP PACKAGES
// Most packages are lazy loaded
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var plugin      = require('gulp-load-plugins')();
var touch       = require('gulp-touch-cmd');
var filter      = require('gulp-filter');
var gutil       = require('gulp-util');
var imagemin    = require('gulp-imagemin');

// Enter URL of your local server here
// Example: 'http://localwebsite.dev'
const LOCAL_URL = 'krieger.local/';

// File paths to various assets are defined here.
const SOURCE = {
  sass: [
    'assets/components/foundation-sites/scss',
    'assets/components/motion-ui/src',
    'assets/components/fontawesome/scss',
    'assets/scss/**/*.scss'
  ],
  javascript: [
    'assets/components/what-input/what-input.js',
    'assets/components/foundation-sites/js/foundation.core.js',
    'assets/components/foundation-sites/js/foundation.util.*.js',

    // Paths to individual JS components defined below
    //'assets/components/foundation-sites/js/foundation.abide.js',
    'assets/components/foundation-sites/js/foundation.accordion.js',
    'assets/components/foundation-sites/js/foundation.accordionMenu.js',
    'assets/components/foundation-sites/js/foundation.drilldown.js',
    'assets/components/foundation-sites/js/foundation.dropdown.js',
    'assets/components/foundation-sites/js/foundation.dropdownMenu.js',
    'assets/components/foundation-sites/js/foundation.equalizer.js',
    'assets/components/foundation-sites/js/foundation.interchange.js',
    //'assets/components/foundation-sites/js/foundation.magellan.js',
    'assets/components/foundation-sites/js/foundation.offcanvas.js',
    'assets/components/foundation-sites/js/foundation.orbit.js',
    'assets/components/foundation-sites/js/foundation.responsiveMenu.js',
    'assets/components/foundation-sites/js/foundation.responsiveToggle.js',
    //'assets/components/foundation-sites/js/foundation.reveal.js',
    //'assets/components/foundation-sites/js/foundation.slider.js',
    //'assets/components/foundation-sites/js/foundation.sticky.js',
    'assets/components/foundation-sites/js/foundation.tabs.js',
    //'assets/components/foundation-sites/js/foundation.toggler.js',
    //'assets/components/foundation-sites/js/foundation.tooltip.js',
    'assets/components/foundation-sites/js/foundation.zf.responsiveAccordionTabs.js',


    // Motion UI
    'assets/components/motion-ui/motion-ui.js',

    // Include your own custom scripts (located in the custom folder)
    'assets/javascript/custom/*.js',
  ],

    // Images placed here will be optimized
  images: 'assets/images/**/*',


  phpcs: [
    '**/*.php',
    '!wpcs',
    '!wpcs/**',
  ],
  pkg: [
    '**/*',
    '!**/node_modules/**',
    '!**/components/**',
    '!**/scss/**',
    '!**/bower.json',
    '!**/gulpfile.js',
    '!**/package.json',
    '!**/composer.json',
    '!**/composer.lock',
    '!**/codesniffer.ruleset.xml',
    '!**/packaged/*',
  ]
};

const ASSETS = {
  styles: 'assets/scss/',
  scripts: 'assets/javascript/',
  images: 'assets/images/',
  all: 'assets/'
};

const JSHINT_CONFIG = {
  "node": true,
  "globals": {
    "document": true,
    "window": true,
    "jQuery": true,
    "$": true,
    "Foundation": true
  }
};

// GULP FUNCTIONS
// JSHint, concat, and minify JavaScript
gulp.task('javascript', function() {

  // Use a custom filter so we only lint custom JS
  const CUSTOMFILTER = filter(ASSETS.javascript + 'js/**/*.js', {restore: true});

  return gulp.src(SOURCE.javascript, {allowEmpty: true})
    .pipe(plugin.plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
    .pipe(plugin.sourcemaps.init())
    .pipe(plugin.babel({
      presets: ['@babel/preset-env'],
      compact: true,
      ignore: ['what-input.js']
    }))
    .pipe(CUSTOMFILTER)
      .pipe(plugin.jshint(JSHINT_CONFIG))
      .pipe(plugin.jshint.reporter('jshint-stylish'))
      .pipe(CUSTOMFILTER.restore)
    .pipe(plugin.concat('foundation.js'))
    .pipe(plugin.uglify())
    .pipe(plugin.sourcemaps.write('.')) // Creates sourcemap for minified JS
    .pipe(gulp.dest('assets/javascript'))
    .pipe(touch());
});

// Compile Sass, Autoprefix and minify
gulp.task('sass', function() {
  return gulp.src(SOURCE.sass)
    .pipe(plugin.plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
    .pipe(plugin.sourcemaps.init())
    .pipe(plugin.sass())
    .pipe(plugin.autoprefixer())
    .pipe(plugin.cssnano({safe: true, minifyFontValues: {removeQuotes: false}}))
    .pipe(plugin.sourcemaps.write('.'))
    .pipe(gulp.dest('assets/stylesheets'))
    .pipe(touch());
});

// Optimize images, move into assets directory
gulp.task('images', function() {
  return gulp.src(SOURCE.images)
    .pipe(imagemin([
    imagemin.gifsicle({interlaced: true}),
    imagemin.mozjpeg({quality: 75, progressive: true}),
    imagemin.optipng({optimizationLevel: 5}),
    imagemin.svgo({
        plugins: [
            {removeViewBox: true},
            {cleanupIDs: false}
        ]
    })]))
    .pipe(gulp.dest(ASSETS.images))
    .pipe(touch());
});

// Browser-Sync watch files and inject changes
gulp.task('browsersync', function() {

    // Watch these files
    var files = [
      SOURCE.php,
    ];

    browserSync.init(files, {
      proxy: LOCAL_URL,
      /*https: {
        key: "/Volumes/Macintosh HD 2/pineapple/localhost.key",
        cert: "/Volumes/Macintosh HD 2/pineapple/localhost.crt"
      }*/
    });

    gulp.watch(SOURCE.sass, gulp.parallel('sass')).on('change', browserSync.reload);
    gulp.watch(SOURCE.javascript, gulp.parallel('javascript')).on('change', browserSync.reload);
    gulp.watch(SOURCE.images, gulp.parallel('images')).on('change', browserSync.reload);

});

// Watch files for changes (without Browser-Sync)
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch(SOURCE.sass, gulp.parallel('sass'));

  // Watch scripts files
  gulp.watch(SOURCE.javascript, gulp.parallel('javascript'));

  // Watch images files
  gulp.watch(SOURCE.images, gulp.parallel('images'));
  browserSync.reload();
});

// Run styles, scripts and foundation-js
gulp.task('default', gulp.parallel('sass', 'javascript', 'images'));