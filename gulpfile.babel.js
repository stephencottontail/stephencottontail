import gulp from 'gulp';
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';

gulp.task('copy', [
	'copy:normalize'
]);

gulp.task('copy:normalize', () => {
	gulp.src('node_modules/normalize.css/normalize.css')
	    .pipe(gulp.dest('assets/css'))
});

gulp.task('styles', () => {
	gulp.src('assets/sass/**/*')
	    .pipe(sass().on('error', sass.logError))
	    // .pipe(autoprefixer({
	    //	browsers: ['last 2 versions'],
	    //	cascade: false
	    //}))
	    .pipe(gulp.dest('./'))
});

gulp.task('watch', () => {
	gulp.watch('assets/sass/**/*.scss', ['styles']);
});

gulp.task('default', ['copy', 'styles']);
