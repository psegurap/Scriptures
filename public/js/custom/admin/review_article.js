// $(window).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            article : article,
            review : {
                desicion : '',
                comment : '',
            }
        },
        mounted: function(){

        },
        computed: {
            
        },
        watch : {

        },
        methods: {
            randomString: function(){
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < 20; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            },
            SaveReview: function(){
                $(".review_area").LoadingOverlay("show");
                axios.post(homepath + '/admin/articles/reviews/StoreReview', {article_id : this.article.id, review : this.review}).then(function(response){
                    $(".review_area").LoadingOverlay("hide");
                    swal({
                        text: "¡La respuesta ha sido guardada!",
                        icon: "success",
                    }).then(function(){
                        // window.location.reload();
                    });
                }).catch(function(error){
                    $("main").LoadingOverlay("hide");
                    $.toast({
                        heading: 'Error',
                        text: 'Ha ocurrido un error.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                    console.log(error);
                });
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
        },
    });
// });