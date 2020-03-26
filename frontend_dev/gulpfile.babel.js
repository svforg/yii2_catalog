'use strict';

    const gulp = require('gulp');
    const requireDir = require('require-dir');

    const project = requireDir('./gulp');
    const site = requireDir('./gulp/site');
    const layouts = requireDir('./gulp/layouts');

    gulp.task('watch',
        project.allFiles.watch
    );

    gulp.task('default', gulp.parallel(

        site.index.build,

        layouts.header.build,

        layouts.footer.build,

        project.allFiles.build
    ));
