'use strict';
var gulp = require('gulp'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    less = require('gulp-less'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-clean-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    concat = require('gulp-concat'),
    rimraf = require('rimraf'),
    htmlreplace = require('gulp-html-replace'),
    rename = require('gulp-rename'),
    browserSync = require('browser-sync'),
    watch = require('gulp-watch'),
    pump = require('pump'),
    clean = require('gulp-clean'),
    time = Date.now(),
    reload = browserSync.reload,
    nameDomain = 'dnvcpprmgz.local';

var server = {
    backend: {
        proxy: nameDomain,
        notify: false
    },
    frontend: {
        server: {
            baseDir: "./build"
        },
        tunnel: true,
        host: 'localhost',
        port: 9000,
        logPrefix: "Frontend Project"
    }
};

gulp.task('webserver', function() {
    browserSync(server.backend);
});

var path = {
    build: {
        php: 'build/',
        js: 'build/js/',
        css: 'build/css/',
        fonts: 'build/fonts'
    },
    public: {
        php: 'public/',
        js: 'public/js/',
        css: 'public/css/',
        fonts: 'public/fonts'
        },
    srcPublic: {
        php: ['src/**/*.php', '!src/**/config.php' ,'src/**/*.html','!src/fonts/**/*.html' , '!src/template/**/*.*'],
        js: 'src/js/*.js',
        less: 'src/less/*.less',
        fonts: 'src/fonts/**/*.*'
    },
    src: {
        php: ['src/**/*.php', 'src/**/*.html','!src/fonts/**/*.html' , '!src/template/**/*.*'],
        js: 'src/js/*.js',
        less: 'src/less/*.less',
        fonts: 'src/fonts/**/*.*'
    },
    watch: {
        html: 'src/**/*.html',
        php: 'src/**/*.php',
        js: 'src/js/*.js',
        css: 'src/less/*.less'
    },
    clean: ['build/app', 'build/css', 'build/js', 'build/_link' , 'build/*.php', 'build/fonts', './public']
};


gulp.task('clean', function() {
    return gulp.src(path.clean, {read: false})
        .pipe(clean());
});


gulp.task('php:build', function() {
    return gulp.src(path.src.php)
        .pipe(gulp.dest(path.build.php))
        .pipe(reload({ stream: true }));
});

gulp.task('phpServer:build', function() {
    return gulp.src(path.srcPublic.php)
        .pipe(gulp.dest(path.public.php))
        .pipe(reload({ stream: true }));
});

gulp.task('php:build', function() {
    return gulp.src(path.src.php)
        .pipe(gulp.dest(path.build.php))
        .pipe(reload({ stream: true }));
});

gulp.task('fonts:build', function() {
    return gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
        .pipe(reload({ stream: true }));
});

gulp.task('folder', function() {
    return gulp.src('src/js/plugins/**/*.*')
        .pipe(gulp.dest('build/js/plugins/'))
        .pipe(reload({ stream: true }));
});

gulp.task('folderServer', function() {
    return gulp.src('src/js/plugins/**/*.*')
        .pipe(gulp.dest('public/js/plugins/'))
        .pipe(reload({ stream: true }));
});

gulp.task('js:build', ['folder'], function(cb) {
    pump([  
            gulp.src(path.src.js),
            rigger(),
            // sourcemaps.init(),
            // uglify(),
            // sourcemaps.write(),
            gulp.dest(path.build.js)
        ],
        cb
    );
});

gulp.task('jsServer:build', ['folderServer'], function(cb) {
    pump([  
            gulp.src(path.srcPublic.js),
            rigger(),
            uglify(),
            gulp.dest(path.public.js)
        ],
        cb
    );
});


gulp.task('cssServer:build', function() {
     gulp.src('src/less/*.less')
        .pipe(rigger())
        .pipe(less())
        .pipe(prefixer())
        .pipe(cssmin())
        .pipe(gulp.dest(path.public.css));
});

gulp.task('css:build', function() {
     gulp.src('src/less/*.less')
        .pipe(sourcemaps.init())
        .pipe(rigger())
        .pipe(less())
        .pipe(prefixer())
        .pipe(cssmin())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css))
        .pipe(reload({ stream: true }));
});

gulp.task('build', [
    'fonts:build',
    'php:build',
    'css:build',
    'js:build'
]);

gulp.task('public', [
    'phpServer:build',
    'cssServer:build',
    'jsServer:build'
]);


gulp.task('watch', function() {
    gulp.watch('src/less/**/*.less', ['css:build']);
    gulp.watch(path.watch.js, ['js:build']);
    gulp.watch(path.watch.html, ['php:build']);
    gulp.watch(path.watch.php, ['php:build']);
    gulp.watch(path.watch.js).on('change', browserSync.reload);
    gulp.watch(path.watch.html).on('change', browserSync.reload);
    gulp.watch(path.watch.php).on('change', browserSync.reload);
});

gulp.task('default', ['build', 'webserver', 'watch']);