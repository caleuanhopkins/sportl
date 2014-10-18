module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        shell: {
            gitRepoUpdate: {
                command: [
                    'git remote update --prune',
                    'git status'
                ].join('&&'),
                options: {
                    stdout: true
                }
            }
        },
        concat: {
            dist: {
                src: [
                    'public/assets/js/vendor/parsleyjs/parsley.js',
                    'public/assets/js/global.js',
                    'public/assets/js/vendor/restfulizer/restfulizer.js',
                    'public/assets/js/vendor/bootstrap/bootstrap.min.js'
                ],
                dest: 'public/assets/js/build/production.js',
            }
        },
        uglify: {
            build: {
                src: 'public/assets/js/build/production.js',
                dest: 'public/assets/js/build/production.min.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'public/assets/css/global.css': 'public/assets/css/global.scss'
                }
            }
        },
        watch: {
            scripts: {
                files: ['public/assets/js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['public/assets/css/*/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            },
        },
    });

    require('load-grunt-tasks')(grunt);

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['shell', 'concat', 'uglify', 'sass', 'watch']);

};