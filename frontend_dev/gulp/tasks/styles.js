const gulp = require('gulp');
const preproc = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const gcmq = require('gulp-group-css-media-queries');
const browserSync = require('browser-sync').create();

exports.styles = function(slugInput, slugOutput) {
  return (
    gulp.src(slugInput)
      .pipe(sourcemaps.init())
      .pipe(preproc())
      .on("error", preproc.logError)
      .pipe(gcmq())
      .pipe(autoprefixer({
        browsers: ['> 0.01%'],
        cascade: false
      }))
      .pipe(cleanCSS({
        level: 2
      }))
      .pipe(sourcemaps.write('/map/.'))
      .pipe(gulp.dest(slugOutput))
      .pipe(browserSync.stream())
  )
};
