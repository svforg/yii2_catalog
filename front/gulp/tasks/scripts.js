const gulp = require('gulp');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();

exports.scripts = function(slugInput, slugOutput) {
  return (
    gulp.src(slugInput)
      .pipe(concat('scripts.min.js'))
      .pipe(uglify({toplevel: true}))
      .pipe(gulp.dest(slugOutput))
      .pipe(browserSync.stream())
  )
};
