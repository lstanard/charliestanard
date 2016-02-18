# charliestanard.com

All source files for my personal website. Built with WordPress.

### Grunt

Grunt is used to compile all SASS and JS found in the 'assets' directory &ndash; SASS is compiled to the 'css' directory, and JavaScript is sent to the 'js' directory. Compiled code is not committed to the repo.

#### Tasks

##### build

Run `grunt build` to manually re-build all theme assets.

##### dev

Run `grunt dev` to compile all files and start the watch task.

### Bower

Currently Bower is being used to manage external dependencies. Run `bower install` to download necessary libraries.

### SASS

#### Linting

Sass linting rules borrowed from the [18F style guide](https://raw.githubusercontent.com/18F/frontend/18f-pages-staging/.scss-lint.yml).