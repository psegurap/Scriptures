'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    var main = new Vue({
        el: 'main',
        data: {
            categorias : [],
            category : {
                category_name_es : null,
                category_name_en : null,
            },
            dt : null,
            view : 'create',
            current_category : null,
        },
        watch: {
            categories : function(val){
                this.dt.clear()
                this.dt.rows.add(val);
                this.dt.draw();
            },
            'CurrentCategory': function(val){
                let category = val[0];
                if(category){
                    this.category.category_name_es = category.category_name_es;
                    this.category.category_name_en = category.category_name_en;
                }
            }
        },
        computed: {
            // CurrentCategory: function(){
            //     var _this = this;
            //     return this.categories.filter(function(category){
            //        return category.id == _this.current_category;
            //     }) 
            // }
        },
        mounted: function(){
            var _this = this;
            this.initDataTable();
        },
        methods: {
            openModal: function(modal){
                $('#'+modal).modal('show');
            },
            closeModal: function(modal){
                $('#'+modal).modal('hide');
            },
            addCategory:function(){
                this.view = 'create';
                this.openModal('CategoryModal');
            },
            saveCategory: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/categories/store', this.category).then(function(response){
                    _this.categories = response.data;
                    _this.closeModal('CategoryModal');
                    $.toast({
                        heading: 'Success',
                        text: 'La categoría ha sido guardada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error guardando la categoría.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            initDataTable: function(){
                this.dt = $('#table').DataTable({
                    data : this.categorias,
                    // responsive : true,
                    columns: [
                        {data : 'examen.materia_info.materia'},
                        {data : 'examen.materia_info.facilitador.name'},
                        {data : 'user.name'},
                        {data : 'user.name'},
                        {data : 'user.name'},
                        {data : 'user.name'},
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
});