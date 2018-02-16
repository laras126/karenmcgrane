
"use strict";

var _config = require( "./config.json" );

var gulp = require( "gulp" );
var browserSync = require( 'browser-sync' ).create();

require( "matchdep" )
    .filterDev( "gulp-*" )
    .forEach( function( module ) {
        global[ module.replace( /^gulp-/, "" ) ] = require( module );
    } );

gulp.task( 'serve', function() {

    browserSync.init( {
        proxy: _config.host,
        watchTask: true
    } );

    gulp.watch( _config.dir.input + "scss/**/*.scss", [ 'sass' ] );
    gulp.watch( _config.dir.input + "js/**/*", [ "js" ] );
    gulp.watch( [
        "_preview/**/*.php",
        "views/*.twig"
    ] ).on( 'change', browserSync.reload );

} );

gulp.task( "copy", function() {
    var fonts = gulp.src( _config.dir.input + "type/**" )
        .pipe( gulp.dest( _config.dir.output + "type/" ) );

    var fpo = gulp.src( _config.dir.input + "fpo/**" )
        .pipe( gulp.dest( _config.dir.output + "fpo/" ) );

    var svg = gulp.src( _config.dir.input + "svg/**" )
        .pipe( gulp.dest( _config.dir.output + "svg/" ) );

    return [ fonts, fpo, svg ];
} );

gulp.task( "js", function() {
    var initial = {
        src: [
            _config.dir.input + "js/config.js",
            _config.dir.input + "js/utils.js",
            _config.dir.input + "js/lib/fontfaceobserver.js",
            // initial.js needs to be last.
            _config.dir.input + "js/initial.js"
        ],
        name: "initial.js",
        output: _config.dir.output + "js/"
    };

    var picturefill = {
        src: _config.dir.input + "js/lib/picturefill.js",
        name: "picturefill.js",
        output: _config.dir.output + "js/lib/"
    };

    var js_initial = gulp.src( initial.src )
        .pipe( concat( initial.name ) )
        .pipe( uglify() )
        .pipe( gulp.dest( initial.output ) );

    var js_picturefill = gulp.src( picturefill.src )
        .pipe( concat( picturefill.name ) )
        .pipe( uglify() )
        .pipe( gulp.dest( picturefill.output ) );

    return js_picturefill;
} );

gulp.task( "sass", function() {
    return gulp.src( _config.dir.input + "scss/main.scss" )
        .pipe( sourcemaps.init() )
        .pipe( sass( {
            outputStyle: "compressed",
            errLogToConsole: false,
            onError: function(err) {
                return notify().write(err);
            }
        } ) )
        .pipe( sourcemaps.write() )
        .pipe( autoprefixer( {
            browsers: 'last 3 versions'
        } ) )
        .pipe( gulp.dest( _config.dir.output + "css/" ) )
        .pipe( browserSync.stream() );
} );

gulp.task( "default", [
    "js",
    "sass",
    "copy",
    "serve"
] );
