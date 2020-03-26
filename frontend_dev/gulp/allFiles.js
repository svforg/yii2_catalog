'use strict';

const path = {
    release: {
        localDomain: "debem_catalog/",
        mainPath : '../web/',
        stylePath: '../web/css',
        templatePath: '../views/',
        imagesPath: '../web/images/',
        scriptsPath: '../web/js/'
    },
    app: {
        styleWatch: './app/views/**/*.scss',
        styleFiles: './app/*.scss',
        phpWatch: './app/views/**/*.php',
        phpFiles: './app/views/*.php',
        imagesFiles: './app/img/**/*.*',
        scriptsFiles : [
            //'./app/general/js/vendor/jquery/*.js',
            //'./app/general/js/vendor/bootstrapJS/*.js',
            './app/general/js/libs/**/*.js',
            './app/general/js/general.js',
            //'./app/general/js/form-send.js',
            './app/views/**/*.js',
        ]
    }
};

import * as stylesFile from './tasks/styles.js';
import * as scriptsFile from './tasks/scripts.js';
import * as imagesFile from './tasks/images.js';
import * as watchFile from './tasks/watch.js';


exports.build = () => {
    stylesFile.styles(path.app.styleFiles, path.release.stylePath),
    scriptsFile.scripts(path.app.scriptsFiles, path.release.scriptsPath),
    imagesFile.images(path.app.imagesFiles, path.release.imagesPath)
};

exports.watch = () => {
    watchFile.watch(
        path.release.localDomain,
        path.app.styleWatch,
        path.app.styleFiles,
        path.release.stylePath,
        path.app.scriptsFiles,
        path.release.scriptsPath,
        path.app.phpWatch,
        path.app.phpFiles,
        path.release.templatePath,
    )
};

