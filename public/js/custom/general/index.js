// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            slider_post : slider_post,
            dont_miss : dont_miss,
            recent_posts_pagination : recent_posts_pagination,
            featured_post : featured_post
        },
        watch: {
            
        },
        computed: {
            
        },
        mounted: function(){
            var _this = this;
            // this.initSummernote();

        },
        methods: {
            validate: function(callback){
                var _this = this;
                this.$validator.validateAll().then(function(result){
                    if(result){
                        callback();
                    }else{
                        $.toast({
                            heading: 'Error',
                            text: 'Necesitas corregir los errores.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position : 'top-right'
                        })
                    }
                })
            }
        }
    });
});