module.exports = function (grunt) {

    // ===========================================================================
    // CONFIGURE GRUNT ===========================================================
    // ===========================================================================

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),


        // all of our configuration will go here

        watch: {
            scripts: {
                files: 'js/*.js',
                tasks: ['concat', 'uglify']
            },
            css: {
                files: 'css/sass/*.scss',
                tasks: ['sass', 'cssmin']
            }
        },

        concat: {
            js: {
                src: ['js/*.js'],
                dest: 'js/scripts.js'
            },
            css: {
                src: ['css/main.css'],
                dest: 'css/main.css'
            }
        },

        sass: {
            build: {
                files: [{
                    src: ['css/sass/main.scss'],
                    dest: 'css/main.css'
                }]
            }
        },

        uglify: {
            build: {
                files: [{
                    src: 'js/scripts.js',
                    dest: 'js/scripts.js'
                }]
            }
        },

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'css/',
                    src: ['*.css', '!*.min.css'],
                    dest: 'css/',
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