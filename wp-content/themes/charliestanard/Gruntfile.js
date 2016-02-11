module.exports = function(grunt) {

	/*
	 *
	 *	Path variables
	 *	---
	 *
	 */

	var sassSrc = [
			'assets/sass/*.scss',
			'assets/sass/*/*.scss',
			'!assets/sass/_vendor/*.scss',
			'!assets/sass/base/_normalize.scss'
		],
		jsSrc = [
			'Gruntfile.js',
			'assets/js/*'
		],
		imgSrc = [];


	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		/*
		 *
		 *	Scripts
		 *	---
		 *
		 */

		jshint: {
			all: jsSrc
		},

		concat: {
			dist: {
				src: ['assets/js/utility.js', 'assets/js/custom.js'],
				dest: 'js/site.js'
			}
		},

		uglify: {
			options: {
				mangle: true
			},
			dist: {
				files: [{
					expand: true,
					cwd: 'js',
					src: ['*.js', '!*.min.js'],
					dest: 'js',
					ext: '.min.js'
				}]
			}
		},

		/*
		 *
		 *	Styles
		 *	---
		 *
		 */

		scsslint: {
			options: {
				config: '.scss-lint.yml',
				colorizeOutput: true,
			},
			dist: {
				src: sassSrc
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
					cwd: 'assets/sass',
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
				src: 'css/*.css'
			}
		},

		cssnano: {
			options: {
				sourceMap: true
			},
			dist: {
				files: [{
					expand: true,
					cwd: 'css',
					src: ['*.css', '!*.min.css'],
					dest: 'css',
					ext: '.min.css'
				}]
			}
		},

		/*
		 *
		 *	Copy
		 *	---
		 *
		 */

		copy: {
			bower_components: {
				files: {
					'js/lib/respond.min.js': ['bower_components/respond/dest/respond.min.js'],
				}
			}
		},

		watch: {
			grunt: {
				files: ['Gruntfile.js'],
				tasks: ['default'],
				options: {
					livereload: true
				}
			},
			php: {
				files: ['*.php', 'partials/*.php'],
				options: {
					livereload: true
				}
			},
			styles: {
				files: sassSrc,
				tasks: ['style'],
				options: {
					livereload: true
				}
			},
			scripts: {
				files: jsSrc,
				tasks: ['script'],
				options: {
					livereload: true
				}
			}
		}

	});

	/*
	 *
	 *	Tasks
	 *	---
	 *
	 */

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

	grunt.registerTask('dev', [
		'default',
		'watch'
	]);

	/*
	 *
	 *	Load plugins
	 *	---
	 *
	 */

	grunt.loadNpmTasks('grunt-scss-lint');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-cssnano');

	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-notify');

};