import gulp from 'gulp';
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import uglify from 'gulp-uglify';
import clean from 'gulp-clean-css';

gulp.task('copy', [
	'copy:normalize'
]);

gulp.task('copy:normalize', () => {
	gulp.src('node_modules/normalize.css/normalize.css')
	    .pipe(gulp.dest('assets/css'))
});

gulp.task('styles', () => {
	gulp.src('assets/sass/**/*.scss')
	    .pipe(sass().on('error', sass.logError))
        .pipe(clean())
	    .pipe(autoprefixer({
	    	browsers: ['last 2 versions'],
	    	cascade: false
	    }))
	    .pipe(gulp.dest('./'))
});

gulp.task('watch', () => {
	gulp.watch('assets/sass/**/*.scss', ['styles']);
});

gulp.task('scripts', () => {
    gulp.src('assets/js/**.js')
        .pipe(uglify())
        .pipe(gulp.dest('./js/'))
});

gulp.task('default', ['copy', 'styles']);
