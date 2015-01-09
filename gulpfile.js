var gulp = require('gulp'),
sass = require('gulp-ruby-sass'),
concat = require('gulp-concat'),
uglify = require('gulp-uglify'),
minifyCSS = require('gulp-minify-css'),
jshint = require('gulp-jshint'),
rename = require('gulp-rename'),
size = require('gulp-size'),
pkg = require('./package.json');

var paths = {
  styles: '',
  scripts: ''
};


// The default task (called when you run `gulp` from cli)
gulp.task('default', ['']);
