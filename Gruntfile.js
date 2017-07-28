/**
 * Created by Lenovo on 7/28/2017.
 */
module.exports = function(grunt){
    grunt.initConfig({
        less: {
            development: {
                options: {
                    paths: ['assets/css']
                },
                files : {
                    'assets/css/style.css' : 'assets/less/bootstrap.less'
                }
            }
        },
        watch: {
            files : ['assets/less/*.less'],
            task: ['less']
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['less', 'watch']);
};