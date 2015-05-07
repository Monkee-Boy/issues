var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifyCSS = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    size = require('gulp-size'),
    stripDebug = require('gulp-strip-debug'),
    sourcemaps = require('gulp-sourcemaps'),
    pkg = require('./package.json');

var paths = {
  styles: './public/css/sass/styles.scss',
  scripts: ['./public/js/materialize.js', './public/js/main.js']
};

gulp.task('styles', ['components'], function() {
  return sass(paths.styles, { sourcemap: false })
  .on('error', function (err) {
    console.error('Error', err.message);
  })
  .pipe(rename('app.css'))
  .pipe(gulp.dest('./public/css/'))
  .pipe(rename('app.min.css'))
  .pipe(minifyCSS())
  .pipe(sourcemaps.write())
  .pipe(size())
  .pipe(gulp.dest('./public/css/'));
});

gulp.task('components', function() {
  return gulp.src(['./public/components/normalize.css/normalize.css'])
  .pipe(rename('_normalize.scss'))
  .pipe(gulp.dest('./public/components/normalize.css/'));
});

gulp.task('scripts', ['lint'], function() {
  gulp.src(paths.scripts)
    .pipe(concat('app.js'))
    .pipe(gulp.dest('./public/js/'))
    .pipe(rename('app.min.js'))
    //.pipe(stripDebug())
    .pipe(uglify({ preserveComments: 'some' }))
    .pipe(size())
    .pipe(gulp.dest('./public/js/'));
});

gulp.task('lint', function () {
  return gulp.src(['./public/js/main.js'])
    .pipe(jshint('./.jshintrc'))
    .pipe(jshint.reporter('jshint-stylish'));
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['styles', 'scripts']);
