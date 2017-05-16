module.exports = function (grunt) {

    // ===========================================================================
    // CONFIGURE GRUNT ===========================================================
    // ===========================================================================

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),


        // all of our configuration will go here

        watch: {
            scripts: {
                files: 'src/js/*.js',
                tasks: ['concat', 'uglify']
            },
            css: {
                files: 'src/css/sass/*.scss',
                tasks: ['sass', 'cssmin']
            }
        },

        concat: {
            js: {
                src: ['src/js/*.js'],
                dest: 'builds/scripts.js'
            },
            css: {
                src: ['css/main.css'],
                dest: 'builds/main.css'
            }
        },

        sass: {
            build: {
                files: [{
                    src: ['src/css/sass/main.scss'],
                    dest: 'builds/main.css'
                }]
            }
        },

        uglify: {
            build: {
                files: [{
                    src: 'builds/scripts.js',
                    dest: 'builds/scripts.js'
                }]
            }
        },

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'builds/',
                    src: ['*.css', '!*.min.css'],
                    dest: 'builds/',
                    ext: '.min.css'
                }]
            }
        }
    });


    //Load plugins
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');


    //Default Task(s)
    grunt.registerTask('default', ['sass', 'cssmin', 'concat', 'uglify', 'watch']);


};