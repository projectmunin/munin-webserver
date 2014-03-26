//Based on Roots Wordpress theme , roots.io
'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'resources/js/*.js',
        '!resources/js/scripts.min.js'
      ]
    },
    less: {
      dist: {
        files: {
          'resources/css/main.min.css': [
            'resources/less/app.less'
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: false,
          sourceMapFilename: 'assets/css/main.min.css.map',
          sourceMapRootpath: '/app/themes/roots/'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'resources/js/scripts.min.js': [
            'resources/js/plugins/bootstrap/transition.js',
            'resources/js/plugins/bootstrap/alert.js',
            'resources/js/plugins/bootstrap/button.js',
            'resources/js/plugins/bootstrap/carousel.js',
            'resources/js/plugins/bootstrap/collapse.js',
            'resources/js/plugins/bootstrap/dropdown.js',
            'resources/js/plugins/bootstrap/modal.js',
            'resources/js/plugins/bootstrap/tooltip.js',
            'resources/js/plugins/bootstrap/popover.js',
            'resources/js/plugins/bootstrap/scrollspy.js',
            'resources/js/plugins/bootstrap/tab.js',
            'resources/js/plugins/bootstrap/affix.js',
            'resources/js/plugins/*.js',
            'resources/js/_*.js'
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    watch: {
      less: {
        files: [
          'resources/less/*.less',
          'resources/less/bootstrap/*.less'
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'resources/css/main.min.css',
          'resources/js/scripts.min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'resources/css/main.min.css',
        'resources/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
