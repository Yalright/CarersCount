const gulp = require("gulp");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const browserSync = require("browser-sync").create();
const uglify = require("gulp-uglify-es").default;
const sourcemaps = require("gulp-sourcemaps");
const gulpif = require("gulp-if");
const autoprefixer = require("gulp-autoprefixer");
const args = require("yargs").argv;

var fs = require("fs");
var json = JSON.parse(fs.readFileSync("./package.json"));
var gulppath = JSON.parse(fs.readFileSync("./gulppath.json"));
var wp_path = "wp-content/themes/";
var themename = "brandpie-starter";
var paths = {
  sourceDir: "src",
  outputDir: "assets",
};

var buildpath = paths["sourceDir"];
var outputpath = paths["outputDir"];
var bootstrappath = "node_modules/bootstrap";

function compileSASS() {
  return (
    gulp
      .src([
        // bootstrappath+'/scss/bootstrap.scss',
        // buildpath + "/scss/**/*.scss",
        // Treats .scss files at /src/scss/ as a parent, and thus separate
        buildpath + "/scss/*.scss",
      ])
      // Init source maps if NOT output for production
      .pipe(gulpif(args.env != "production", sourcemaps.init()))
      .pipe(sass({ outputStyle: "compressed" }))
      // Removed concat, as not needed
      // Output sourcemaps if NOT output for production
      .pipe(gulpif(args.env != "production", sourcemaps.write()))
      .pipe(gulp.dest(outputpath + "/css/"))
      .pipe(browserSync.stream())
  );
}

function compileJS() {
  return (
    gulp
      .src([
        // bootstrappath+'/dist/js/bootstrap.bundle.min.js',
        buildpath + "/js/**/*.js",
      ])
      .pipe(concat("scripts.js"))
      // Only compile if on production
      .pipe(gulpif(args.env === "production", uglify()))
      .pipe(gulp.dest(outputpath + "/js/"))
  );
}

function compileInitJS() {
  return gulp
    .src([buildpath + "/init/**/*.js"])
    .pipe(concat("init.js"))
    .pipe(gulpif(args.env === "production", uglify()))
    .pipe(uglify())
    .pipe(gulp.dest(outputpath + "/js/"));
}

function imageProcess() {
  return gulp
    .src(buildpath + "/images/**/*")
    .pipe(gulp.dest(outputpath + "/images"));
}

function fontProcess() {
  return gulp
    .src(buildpath + "/fonts/**/*")
    .pipe(gulp.dest(outputpath + "/fonts"));
}

// Original watch and compile
gulp.task("watch", function () {
  gulp.watch(
    [buildpath + "/scss/**/*.scss", buildpath + "/js/**/*.js"],
    { interval: 1000 },
    compile
  );
});

const compile = gulp.series(
  compileJS,
  compileInitJS,
  compileSASS,
  gulp.parallel(imageProcess, fontProcess)
);

// Watch + Reload addition. Split out watches, add an HTML/PHP watch, and add browser reload
gulp.task("watch-reload", function () {
  // Reload
  browserSync.init({
    proxy: gulppath.proxy,
  });
  // Reload on PHP changes
  gulp
    .watch(["acf-blocks/*.php", "acf-blocks/*/*.php", "partials/*.php", "search-filter/*.php", "functions/*.php", "*.php"], { interval: 1000 })
    .on("change", browserSync.reload);
  // Compile and reload SCSS changes
  gulp.watch([buildpath + "/scss/**/*.scss"], { interval: 1000 }, exportSASS);
  // Compile and reload JS
  gulp
    .watch([buildpath + "/js/**/*.js"], { interval: 1000 }, exportJS)
    .on("done", browserSync.reload);
  // Optimise, export and reload on image change
  gulp.watch(
    [buildpath + "/images/**/*.{png,gif,jpg,svg}"],
    { interval: 1000 },
    imageProcess
  );
  // NOTE: Currently no local fonts in the system
  // gulp.watch([buildpath + "/fonts/**/*"], { interval: 1000 }, fontProcess);
});

const exportSASS = gulp.series(compileSASS);
const exportJS = gulp.series(compileJS, compileInitJS);

// Exports
exports.compile = compile;
exports.exportSASS = exportSASS;
exports.exportJS = exportJS;
