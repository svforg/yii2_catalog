const gulp = require('gulp');
const imagemin = require('gulp-imagemin');

exports.images = function(slugInput, slugOutput) {
  return (
    gulp.src(slugInput)
      .pipe(imagemin())
      .pipe(gulp.dest(slugOutput))
  )
};
