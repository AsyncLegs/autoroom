const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const minifyCss = require('gulp-minify-css');
const uglify = require('gulp-uglify');
const browserify = require('browserify');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');

const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const gutil = require('gulp-util');


const path = {
    application: './frontend/',
    node_modules: './node_modules/',
    public: './web/'
};


gulp.task('browser-sync', function () {
    browserSync.init({
        proxy: "avtoroom.dev"
    });
});

gulp.task('watch', function () {
    browserSync.init({
        proxy: "avtoroom.dev"
    });
    gulp.watch(path.application + 'sass/*.scss', ['compileCss']);
    // gulp.watch(path.application+'images/*.{gif,jpg,png,svg}', ['img']);
    gulp.watch(path.public + "index.php").on('change', browserSync.reload);
});

gulp.task('sass', function () {
    gulp.src(path.application + 'sass/application.scss')
        .pipe(sass())
        .pipe(minifyCss())
        .pipe(autoprefixer({
            browsers: [
                'last 2 versions', "Android 2.3", "Android >= 4", "Chrome >= 20", "Firefox >= 24", "Explorer >= 10", "iOS >= 6", "Opera >= 12", "Safari >= 8"
            ],
            cascade: false
        }))
        .pipe(browserSync.stream())
        .pipe(gulp.dest(path.public + '/css'))

});

gulp.task('js', function () {

    let b = browserify({
        entries: path.application + 'js/application.js',
        debug: true,

    }).transform("babelify", {presets: ["es2015"]});

    return b.bundle()
        .pipe(source('application.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(uglify())
        .on('error', gutil.log)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.public + '/js/'));
});

gulp.task('copy-assets', function () {
    //copy images
    gulp.src(path.application + 'images/**/*.{gif,jpg,png,svg,ico}')
        .pipe(gulp.dest(path.public + '/images'));
    //copy fonts
    gulp.src(path.application + 'fonts/**/*.{ttf,eot,woff,woff2}')
        .pipe(gulp.dest(path.public + '/fonts'));
});


gulp.task('default', ['sass', 'js', 'copy-assets']);
