// $(document).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            members : members,
        },
        mounted: function(){

        },
        computed: {
            
        },
        watch : {
            
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
        },
    });
// });