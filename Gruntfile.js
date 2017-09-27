/*global module:false,require:false*/
module.exports = function(grunt) {

    require('matchdep').filterDev('grunt-*').forEach( grunt.loadNpmTasks );

    var connectSSI = require('connect-ssi');

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON( "package.json" ),

        _config: {
            dir: {
                input: "_assets/",
                tmpl: "_preview/",
                output: "dist/assets/"
            }
        },

        browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        '<%= _config.dir.output %>**/*',
                        '<%= _config.dir.tmpl %>**/*.php'
                    ]
                },
                options: {
                    proxy: "local.karenmcgrane",
                    port: 8080,
                    watchTask: true
                }
            }
        },

        concat: {
            js_initial: {
                src: [
                    '<%= _config.dir.input %>js/config.js',
                    '<%= _config.dir.input %>js/utils.js',
                    '<%= _config.dir.input %>js/lib/fontfaceobserver.js',
                    // initial.js needs to be last.
                    '<%= _config.dir.input %>js/initial.js'
                ],
                dest: '<%= _config.dir.output %>js/initial.js'
            },
            js_picturefill: {
                src: [
                    '<%= _config.dir.input %>js/lib/picturefill.js'
                ],
                dest: '<%= _config.dir.output %>js/lib/picturefill.js'
            }
        },

        connect: {
            server: {
                options: {
                    port: 3005,
                    hostname: '*',
                    base: '<%= _config.dir.tmpl %>'
                }
            }
        },

        copy: {
            fonts: {
                expand: true,
                cwd: '<%= _config.dir.input %>type/',
                src: ['**'],
                dest: '<%= _config.dir.output %>type/',
            },
            fpo: {
                expand: true,
                cwd: '<%= _config.dir.input %>fpo/',
                src: ['**'],
                dest: '<%= _config.dir.output %>fpo/',
            },
            svg: {
                expand: true,
                cwd: '<%= _config.dir.input %>svg/',
                src: ['**'],
                dest: '<%= _config.dir.output %>svg/',
            }
        },

        sass: {
            dist: {
                options: {
                    style: 'compressed',
                },
                files: {
                    '<%= _config.dir.output %>css/main.css': '<%= _config.dir.input %>scss/main.scss',
                }
            }
        },

        uglify: {
            js_initial: {
                src: [
                    '<%= concat.js_initial.dest %>'
                ],
                dest: '<%= concat.js_initial.dest %>'
            },
            js_picturefill: {
                src: [
                    '<%= concat.js_picturefill.dest %>'
                ],
                dest: '<%= concat.js_picturefill.dest %>'
            }
        },

        watch: {
            html: {
                files: [
                    '<%= _config.dir.tmpl %>*.php'
                ],
                tasks: [ "copy" ]
            },
            css: {
                files: [
                    '<%= _config.dir.input %>scss/**/*'
                ],
                tasks: [ "sass", "copy" ]
            },
            js: {
                files: [
                    '<%= _config.dir.input %>js/**/*'
                ],
                tasks: [ "concat", "uglify", "copy" ]
            },
            tasks: {
                files: [
                    'Gruntfile.js'
                ],
                tasks: [ "default" ]
            }
        }
    });

    grunt.registerTask( "build", [
        "concat",
        "sass",
        "uglify",
        "copy",
        "connect",
        "browserSync",
        "watch"
    ] );

    grunt.registerTask( "default", "build" );

};
