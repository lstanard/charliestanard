module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Scripts

		// Styles
		sass: {
			options: { // https://github.com/sass/node-sass#options
				sourceMap: true,
				style: 'expanded',
				indentType: 'tab',
				indentWidth: 1
				// sourceComments: true,
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
		watch: {
			grunt: {
				files: ['Gruntfile.js']
			},
			styles: {
				files: ['sass/*.scss', 'sass/**/*.scss'],
				tasks: ['style'],
				options: {
					// livereload: true
				}
			}
		}

	});

	// Load plugins
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-cssnano');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-sass');

	// Tasks
	grunt.registerTask('default', ['sass', 'postcss', 'cssnano']);
	grunt.registerTask('style', ['sass', 'postcss', 'cssnano']);

};