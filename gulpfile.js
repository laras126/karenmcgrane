
'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    modernizr = require('gulp-modernizr'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    svgstore = require('gulp-svgstore'),
    sourcemaps = require('gulp-sourcemaps'),
    svgmin = require('gulp-svgmin'),
    path = require('path'),
    modernizr = require('gulp-modernizr'),
    browserSync = require('browser-sync').create();


// Directory and file shortcuts
var sassDir = 'assets/scss/',
    cssDir = 'assets/css/',
    cssDist = 'assets/css/build/',
    jsDir = 'assets/js/',
    jsDist = 'assets/js/build/',
    imgDir = 'assets/img/';

var jsFileList = [
    jsDir + 'vendor/flickity.min.js',
    jsDir + 'vendor/flickity.bglazyload.js',
    jsDir + 'vendor/fitvids.js',
    jsDir + 'src/_main.js'
];

var jsHeadList = [
    jsDir + 'build/modernizr-custom.js',
    jsDir + 'vendor/lazysizes.min.js',
    jsDir + 'vendor/picturefill.min.js'
];

gulp.task('sass', function () {
  return gulp.src(sassDir + 'main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      errLogToConsole: false,
      onError: function(err) {
          return notify().write(err);
      }}))
    // .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefix({
        browsers: 'last 5 versions'
    }))
    .pipe(gulp.dest(cssDir));
    // TODO: make two tasks, or run both for min and unmin files
    // .pipe(cssnano())
    // .pipe(rename({suffix: '.min'}))
    // .pipe(gulp.dest(cssDist));
});

// These could be consolidated into another function
gulp.task('scripts', function() {
  return gulp.src(jsFileList)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(jsDist))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(jsDist));
});

gulp.task('modernizr', function() {
  gulp.src(jsDir + '**/*.js')
    .pipe(modernizr())
    .pipe(gulp.dest(jsDist))
});

gulp.task('scripts-head', function() {
  return gulp.src(jsHeadList)
    .pipe(concat('scripts-head.js'))
    .pipe(gulp.dest(jsDist))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(jsDist));
});

gulp.task('modernizr', function() {
  gulp.src(jsFileList)
    .pipe(modernizr())
    .pipe(gulp.dest(jsDist));
});

gulp.task('svgstore', function () {
    return gulp
        .src(imgDir + 'svg-raw/*.svg')
        .pipe(rename({prefix: 'shape-'}))
        .pipe(svgmin(function (file) {
            var prefix = path.basename(file.relative, path.extname(file.relative));
            return {
                plugins: [{
                    cleanupIDs: {
                        prefix: prefix + '-',
                        minify: true
                    }
                }]
            }
        }))
        .pipe(svgstore())
        .pipe(rename('svg-defs.svg'))
        .pipe(gulp.dest('views/partials'));
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: 'twc.local'
    });
});

gulp.task('watch', function () {
  gulp.watch(sassDir + '**/*.scss', ['sass']);
  gulp.watch(jsDir + 'src/*.js', ['scripts']);
});
