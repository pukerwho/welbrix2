const { src, dest, series } = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const postcss = require("gulp-postcss");
const purgecss = require('gulp-purgecss');
const tailwindcss = require('tailwindcss');

function createTailwindDev() {
  return src("./source/css/tailwind.css")
  .pipe(postcss())
  .pipe(dest("./build/css"))
}

function createTailwindProd() {
  return src("./source/css/tailwind.css")
  .pipe(postcss([
    tailwindcss('./tailwind.config.js'),
    ...(process.env.NODE_ENV === "production"
      ? [
          purgecss({
            content: ["**/*.php"],
            defaultExtractor: content =>
              content.match(/[\w-/:]+(?<!:)/g) || []
          })
        ]
      : [])
  ]))
  .pipe(dest("./build/css"))
}

function scss() {
  return src('./source/sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./build/css'));
}

function scripts() {
	return src('./source/javascript/**/*.js')
		.pipe(concat('all.js'))
    .pipe(dest('./build/js'));
}

exports.scss = scss;
exports.scripts = scripts;
exports.tailwind = createTailwindDev;

exports.default = series(createTailwindProd, scss, scripts);