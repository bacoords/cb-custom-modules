var gulp = require('gulp');
var	gutil = require('gulp-util');
var	sass = require('gulp-sass');
var	autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');
var zip = require('gulp-zip');

gulp.task('default', ['css']);



gulp.task('css', function(){
	gulp.watch('cb-broadside/css/*.scss', ['broadside']);
	gulp.watch('cb-poise/css/*.scss', ['poise']);
	gulp.watch('cb-shade/css/*.scss', ['shade']);
	gulp.watch('cb-spotlight/css/*.scss', ['spotlight']);
	gulp.watch('cb-scout/css/*.scss', ['scout']);
	gulp.watch('cb-dust/css/*.scss', ['dust']);
	gulp.watch('cb-slice/css/*.scss', ['slice']);
	gulp.watch('cb-caption/css/*.scss', ['caption']);
	gulp.watch('cb-simple-events/css/*.scss', ['events']);
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

gulp.task('scout', function(){
	return gulp.src('cb-scout/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-scout/css'));
});
gulp.task('dust', function(){
	return gulp.src('cb-dust/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-dust/css'));
});
gulp.task('slice', function(){
	return gulp.src('cb-slice/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-slice/css'));
});
gulp.task('caption', function(){
	return gulp.src('cb-caption/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-caption/css'));
});

gulp.task('events', function(){
	return gulp.src('cb-simple-events/css/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minifycss())
		.pipe(gulp.dest('cb-simple-events/css'));
});



gulp.task('zip', function () {
  return gulp.src(['./**/*', '!./node_modules/**/*', '!./grid/**/*', '!./cb-posts/**/*'])
    .pipe(zip('cb-custom-modules.zip'))
    .pipe(gulp.dest('./../'));
});
