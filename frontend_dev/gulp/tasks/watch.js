const gulp = require('gulp');
const browserSync = require('browser-sync').create();

import * as stylesFile from './styles.js';
import * as templateFile from './template.js';
import * as scriptsFile from './scripts.js';


exports.watch = function (
    slugProxyName,
    slugStyleWatch,
    slugStyleFiles,
    slugStylePath,
    slugScriptsFiles,
    scriptsPath,
    slugPHPWatch,
    slugPHPFiles,
    slugTemplatePath
    )
  {
  browserSync.init({
    notify: false,
    browser: "chrome",
    proxy: slugProxyName, // local storage in open server
    files: [slugTemplatePath],
  });

  gulp.watch(slugStyleWatch).on('change', () => {
    stylesFile.styles(slugStyleFiles, slugStylePath), browserSync.reload()
  });

  gulp.watch(slugScriptsFiles).on('change',  () => {
      scriptsFile.scripts(slugScriptsFiles, scriptsPath);
      browserSync.reload()
  });

  gulp.watch(slugPHPWatch).on('change',() => {
    templateFile.template(slugPHPFiles, slugTemplatePath);
    browserSync.reload()
  });
};
