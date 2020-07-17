// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            // serie : serie,
            message : {
                name : '',
                subject : '',
                email : '',
                message : '',
            }
        },
        watch: {
            
        },
        computed: {
            
        },
        mounted: function(){
            var _this = this;
        },
        methods: {
            SendMessage: function(){
                var _this = this;
                $("#submit-contact").LoadingOverlay("show");
                axios.post(homepath + '/NewMessage', {message : this.message}).then(function(response){
                    $("#submit-contact").LoadingOverlay("hide");
                    _this.message.message = '';
                    _this.message.subject = '';
                    _this.message.email = '';
                    _this.message.name = '';
                    swal({
                        text: "¡El mensaje ha sido enviado!",
                        icon: "success",
                    }).then(function(){
                        _this.errors.clear();
                        // window.location.reload();
                    });
                }).catch(function(error){
                    $("#submit-contact").LoadingOverlay("hide");
                    $.toast({
                        heading: 'Error',
                        text: 'Ha ocurrido un error enviando el mensaje.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
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