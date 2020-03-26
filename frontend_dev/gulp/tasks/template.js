const gulp = require('gulp');
const fileinclude = require('gulp-file-include');
const browserSync = require('browser-sync').create();

exports.template = function(slugInput, slugOutput) {
  return (
    gulp.src(slugInput)
      .pipe(fileinclude({
        prefix: '@@'
      }))
      .pipe(gulp.dest(slugOutput))
      .pipe(browserSync.stream())
  )
};
