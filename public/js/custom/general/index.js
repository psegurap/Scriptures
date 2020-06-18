// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            slider_post : slider_post,
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
            initSummernote: function(){
                var _this = this;
                this.summernote = $('#summernote').summernote({
                   airMode: true,
                });
                if(lang == 'es'){
                   $('#summernote').summernote('code', this.article.full_content_es );
                }else{
                   $('#summernote').summernote('code', this.article.full_content_en );
                }
                $('#summernote').summernote('disable')
             },
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