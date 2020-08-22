// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    footer = new Vue({
        el: '#overall-footer-container',
        data: {
            // serie : serie,
            email_address : '',
            categories : [],
            tags: [],
        },
        watch: {
            
        },
        computed: {
            
        },
        mounted: function(){
            var _this = this;
            this.GetCategories();
            this.GetTags();
        },
        methods: {
            GetCategories: function(){
                var _this = this;
                axios.get(homepath + '/getFooterCategories').then(function(response){
                    _this.categories = response.data;
                }).catch(function(error){
                    console.log(error);
                })
            },
            GetTags: function(){
                var _this = this;
                axios.get(homepath + '/getFooterTags').then(function(response){
                    _this.tags = response.data;
                }).catch(function(error){
                    console.log(error);
                })
            },
            StoreSubscriber: function(){
                var _this = this;
                $(".follow-by-email-submit").LoadingOverlay("show");
                axios.post(homepath + '/StoreSubscriber', {email : this.email_address}).then(function(response){
                    $(".follow-by-email-submit").LoadingOverlay("hide");
                    _this.email_address = '';
                    swal({
                        text: "¡Te has subscrito con éxito!",
                        icon: "success",
                    }).then(function(){
                        _this.errors.clear();
                    });
                }).catch(function(error){
                    $(".follow-by-email-submit").LoadingOverlay("hide");
                    if(error.response.status == 406){
                        $.toast({
                            heading: 'Warning',
                            text: 'Este correo ya se encuentra registrado.',
                            showHideTransition: 'fade',
                            icon: 'warning',
                            position : 'top-right'
                        })
                    }else{
                        $.toast({
                            heading: 'Error',
                            text: 'Ha ocurrido un error en la subscripción.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position : 'top-right'
                        })
                    }
                    console.log(error);
                })
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