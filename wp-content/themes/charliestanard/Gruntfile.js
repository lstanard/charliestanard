module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Scripts
		jshint: {
			all: ['Gruntfile.js', 'js/src/*.js']
		},

		concat: {
			dist: {
				src: ['js/src/utility.js', 'js/src/custom.js'],
				dest: 'js/site.js'
			}
		},

		uglify: {
			dist: {
				src: ['js/site.js'],
				dest: 'js/site.min.js'
			}
		},

		// Styles
		scsslint: {
			options: {
				config: '.scss-lint.yml',
				colorizeOutput: true,
			},
			dist: {
				src: ['sass/*.scss', 'sass/*/*.scss', '!sass/_vendor/*.scss', '!sass/_modules/_sprites-2x.scss']
			}
		},

		sass: {
			options: { // https://github.com/sass/node-sass#options
				sourceMap: true,
				style: 'expanded',
				indentType: 'tab',
				indentWidth: 1
			},
			dist: {
				files: [{
					expand: true,
					cwd: 'sass',
					src: ['*.scss'],
					dest: 'css',
					ext: '.css'
				}]
			}
		},

		postcss: {
			options: {
				map: {
					inline: false,
					annotation: 'css/'
				},
				processors: [
					require('pixrem')(),
					require('autoprefixer')({
						browsers: 'last 4 versions'
					}),
					require('postcss-cssnext')(),
				]
			},
			dist: {
				src: 'css/*.css' // can also use files: {'dest': ['src']}
			}
		},

		cssnano: {
			options: {
				sourceMap: true
			},
			dist: {
				files: {
					'css/site.min.css': ['css/site.css']
				}
			}
		},

		// Images

		// Misc
		copy: {
			bower_components: {
				files: {
					'js/lib/respond.min.js': ['bower_components/respond/dest/respond.min.js'],
				}
			}
		},

		watch: {
			grunt: {
				files: ['Gruntfile.js', '*.php'],
				options: {
					livereload: true
				}
			},
			styles: {
				files: ['sass/*.scss', 'sass/**/*.scss'],
				tasks: ['style'],
				options: {
					livereload: true
				}
			},
			scripts: {
				files: ['js/*.js', 'js/**/*.js'],
				tasks: ['script'],
				options: {
					livereload: true
				}
			}
		}

	});

	// Tasks
	grunt.registerTask('style', [
		'scsslint',
		'sass',
		'postcss',
		'cssnano'
	]);

	grunt.registerTask('script', [
		'copy:bower_components',
		'jshint',
		'concat',
		'uglify'
	]);

	grunt.registerTask('default', [
		'style',
		'script'
	]);

	grunt.registerTask('build', [
		'style',
		'script'
	]);

	grunt.registerTask('dev', [
		'build',
		'watch'
	]);

	// Load plugins
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-cssnano');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-scss-lint');

};