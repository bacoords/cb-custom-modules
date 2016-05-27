var gulp = require('gulp');
var	gutil = require('gulp-util');
var	sass = require('gulp-sass');
var	autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');


gulp.task('default', ['css']);



gulp.task('css', function(){
	gulp.watch('cb-broadside/css/*.scss', ['broadside']);
	gulp.watch('cb-poise/css/*.scss', ['poise']);
	gulp.watch('cb-shade/css/*.scss', ['shade']);
	gulp.watch('cb-spotlight/css/*.scss', ['spotlight']);
});

gulp.task('broadside', function(){
	return gulp.src('cb-broadside/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-broadside/css'));
});

gulp.task('poise', function(){
	return gulp.src('cb-poise/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-poise/css'));
});

gulp.task('shade', function(){
	return gulp.src('cb-shade/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-shade/css'));
});

gulp.task('spotlight', function(){
	return gulp.src('cb-spotlight/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-spotlight/css'));
});