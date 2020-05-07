var gulp = require('gulp')

var postcss = require('gulp-postcss')
var cleanCss = require('gulp-clean-css')
var sourceMaps = require('gulp-sourcemaps')
var concat = require("gulp-concat")

var webpack = require('webpack-stream')

var imagemin = require('gulp-imagemin')




gulp.task("css", function(){
    return gulp.src([
        "src/css/normalize.css",
        "src/css/typography.css",
        "node_modules/bootstrap-4-grid/css/grid.css",
        "node_modules/slick-carousel/slick/slick.css",
        "node_modules/slick-carousel/slick/slick-theme.css",
        "src/css/hamburger.css",
        "src/css/app.css"
        
    ])
    .pipe(sourceMaps.init())
    .pipe(
        postcss([
            require("autoprefixer"),
            require("postcss-preset-env")({
                stage: 1,
                browsers: ["IE 11", "last 2 versions"]
            }),
        ])
    )
    .pipe(concat("app.css"))
    .pipe(
        cleanCss({
            compatibility: 'ie8'
        })
    )
    .pipe(sourceMaps.write())

    .pipe(gulp.dest("./css"))
})



gulp.task("js", function(){
   return gulp.src([
    "node_modules/bootstrap/js/dist/modal.js",   
    "src/js/*",
    ])
    .pipe(
        webpack({
            mode: 'production',
            devtool: 'source-map',
            output: {
                filename: "app.js"
            }
        })
    )
    .pipe(gulp.dest("./js"))
})

gulp.task("fonts", function () {
    return gulp.src("src/fonts/*")
        .pipe(gulp.dest("./fonts"))
})

gulp.task("images", function() {
    return gulp.src("src/img/*")
        .pipe(imagemin())
        .pipe(gulp.dest("./img"))
})





gulp.task('default', ["js", "css"]);