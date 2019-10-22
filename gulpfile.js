'use strict';

// Gulp
var gulp = require('gulp');

// Sass/CSS stuff
var sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    cssmin = require('gulp-cssmin');

// Cource to be watched, and a task to be triggered after change.
gulp.task('watch', function() {
  gulp.watch('app/assets/css/*.scss', ['build_css']);
});

// Task to build css files
gulp.task('build_css', function () {
    gulp.src(['app/assets/css/style.scss'])
      .pipe(sass({outputStyle: 'compressed'}))
      .pipe(concat('style.css'))
      .pipe(autoprefixer({browsers: ['last 99 versions']}))
      .pipe(cssmin())
      .pipe(gulp.dest('app/assets/css/')); 
    gulp.src(['app/assets/css/header.scss'])
      .pipe(sass({outputStyle: 'compressed'}))
      .pipe(concat('header.css'))
      .pipe(autoprefixer({browsers: ['last 99 versions']}))
      .pipe(cssmin())
      .pipe(gulp.dest('app/assets/css/')); 
    gulp.src(['app/assets/css/footer.scss'])
      .pipe(sass({outputStyle: 'compressed'}))
      .pipe(concat('footer.css'))
      .pipe(autoprefixer({browsers: ['last 99 versions']}))
      .pipe(cssmin())
      .pipe(gulp.dest('app/assets/css/')); 
    gulp.src(['app/assets/css/modal.scss'])
      .pipe(sass({outputStyle: 'compressed'}))
      .pipe(concat('modal.css'))
      .pipe(autoprefixer({browsers: ['last 99 versions']}))
      .pipe(cssmin())
      .pipe(gulp.dest('app/assets/css/')); 
});

