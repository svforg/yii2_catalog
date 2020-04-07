'use strict';

    const gulp = require('gulp');
    const requireDir = require('require-dir');

    const project = requireDir('./gulp');
    const site = requireDir('./gulp/site');
    const catalog = requireDir('./gulp/catalog');
    const product = requireDir('./gulp/product');
    const news = requireDir('./gulp/news');
    const layouts = requireDir('./gulp/layouts');

    gulp.task('watch',
        project.allFiles.watch
    );

    gulp.task('default', gulp.parallel(

        //site.index.build,
        //site.error.build,

        //catalog.index.build,

        //news.index.build,
        //news.view.build,

        //product.view.build,

        // layouts.header.build,
        // layouts.footer.build,
        // layouts.main.build,

        project.allFiles.build
    ));
