var gulp = require('gulp');

var sourceFiles = ['node_modules/requirejs/require.js', 'node_modules/vue/dist/vue.js', 'node_modules/axios/dist/axios.js'];
var destination = 'js/';

gulp.task('default', function () {
    return gulp
        .src(sourceFiles)
        .pipe(gulp.dest(destination));
});
