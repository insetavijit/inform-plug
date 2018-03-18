/*\
|| includeing requred files 
||
\*/
var 
    gulp = require("gulp"),
    colors = require("ansi-colors"),
    log = require('fancy-log'),
    sass = require('gulp-sass'),
    sourceMaps = require("gulp-sourcemaps"),
    plumber = require('gulp-plumber'),
    zip = require('gulp-zip'),
    pkg = require('./package.json')
    
    dirLs = {
        'scss'      : 'asset/scss/**/**.scss',
        'js'        : 'asset/js/**/**.js',
        'typings'   : 'typings',
        'lib'       : 'lib',
        'bin'       : 'bin'
    }
;

gulp.task('tst' , function(){
    log(colors.green( '[ ✓ ]') );
});
/// short-hand methods
gulp.task("all" , [ 'js' , 'scss' , 'sftLib' , 'zip']);
gulp.task("all-w" , [ 'js-w' , 'scss-w' ]);
gulp.task("scss-w" , ['scss'] , function(){ gulp.watch( dirLs.scss , ['scss'] ); });
gulp.task("js-w" , ['js'] , function(){ gulp.watch( dirLs.js , ['js'] ); });


///> scss 
gulp.task('scss', function() {
    gulp.src(dirLs.scss)
    .pipe(plumber())
    .pipe(sourceMaps.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(sourceMaps.write("./map"))
    .pipe(gulp.dest( dirLs.lib ))
});
///> typesctip compiling 
gulp.task('js', function() {
    gulp.src()
    .pipe( plumber() )
    .pipe( sourceMaps.init() )
    .pipe(  )
    .pipe(gulp.dest( dirLs.lib ))
    
});

//> libs to move 
gulp.task('sftLib', function() {
    gulp.src([//just un comment all to use them !!!
        //> fremworks :
        './node_modules/bootstrap/lib/css/bootstrap.min.css',
        './node_modules/bootstrap/lib/js/bootstrap.min.js',
        //> icon - pack 
        './node_modules/font-awesome**/**',
        //>js libs
    ])
    .pipe( gulp.dest(dirLs.lib) )//move to
});

///> zipp

gulp.task('zip', () => {
    var 
        d =new Date(),
        today = d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear() + '-' + d.getTime()
    ;
    gulp.src([
        '**.**',
        '!**.json',
        '!**.js',
        '!**.md',
        '!**.log',
    ])
    .pipe(zip(pkg.name + '-publish-' + today +'.zip' ))
        .on('end' , function(){
                log(
                    colors.bold(colors.green( '[ ✓ ]') ),
                    colors.bold(colors.red( ' Zipped ') ),
                    colors.yellow( '[ ' + pkg.name + '-publish-' + today +'.zip ]'))
        })
    .pipe(gulp.dest( dirLs.bin ))

});