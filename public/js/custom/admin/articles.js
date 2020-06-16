// 'use strict'
// $(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            articles : articles,
            
            dt : null,
        },
        watch: {
            
        },
        computed: {
            
        },
        mounted: function(){
            var _this = this;

            setTimeout(function(){
                $('.main-container').toggleClass("sidebar-closed");
            }, 100);
        },
        methods: {
            initDataTable: function(){
                this.dt = $('#table').DataTable({
                    data : this.categories,
                    // responsive : true,
                    columns: [
                        // {data : 'id'},
                        {data : 'category_es'},
                        {data : 'category_en'},
                        {data : 'id'},
                        {
                            data : 'status',
                            render: function(data){
                                if(data == 1){
                                    return "<div class='text-success' style='font-size: 1.3em;'><i class='fa fa-square' aria-hidden='true'></i></div>"
                                }else{
                                    return "<div class='text-secondary' style='font-size: 1.3em;'><i class='fa fa-square' aria-hidden='true'></i></div>"
                                }
                            }
                        },
                        {
                            data : 'id',
                            render: function(data, row){
                                return "<div class='d-flex justify-content-around'><div class='text-info' style='font-size: 1.3em;'><i onclick='main.editCategory("+data+")' style='cursor:pointer' class='fa fa-pencil-square-o' aria-hidden='true'></i></div><div class='text-danger' style='font-size: 1.3em';><i onclick='main.deleteCategory("+data+")' style='cursor:pointer' class='fa fa-trash' aria-hidden='true'></i></div></div>"
                            }
                        }
                    ]
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
        }
    });
// });