
"use strict";

var gulp = require( "gulp" );

require( "matchdep" )
    .filterDev( "gulp-*" )
    .forEach( function( module ) {
        global[ module.replace( /^gulp-/, "" ) ] = require( module );
    } );

var browsersync = require('browser-sync').create();

var _config = {
    dir: {
        input: "_assets/",
        tmpl: "_preview/",
        output: "dist/assets/"
    }
};

gulp.task( 'browser-sync', function() {

    browsersync.init( {
        files: [
            _config.dir.output + "**/*",
            _config.dir.tmpl + "**/*.php"
        ],
        options: {
            proxy: "local.karenmcgrane",
            port: 8080,
            watchTask: true
        }
    } );
} );

gulp.task( 'connect', function() {
    connect.server( {
        port: 3005,
        host: "local.karenmcgrane",
        base: "./" + _config.dir.tmpl
    } );
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
            style: "compressed",
            errLogToConsole: false,
            onError: function(err) {
                return notify().write(err);
            }
        } ) )
        .pipe( sourcemaps.write() )
        .pipe( autoprefixer( {
            browsers: 'last 3 versions'
        } ) )
        .pipe( gulp.dest( _config.dir.output + "css/" ) );
} );

gulp.task( "watch" , function () {
    gulp.watch( _config.dir.tmpl + "*.php", [ "copy" ] );
    gulp.watch( _config.dir.input + "scss/**/*", [ "sass" ] );
    gulp.watch( _config.dir.input + "js/**/*", [ "js" ] );
    gulp.watch( "gulpfile.js", [ "js", "sass", "copy" ] );
});

gulp.task( "default", [
    "js",
    "sass",
    "copy",
    "connect",
    "browser-sync",
    "watch"
] );
