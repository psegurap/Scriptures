// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            categories : categories,
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
                    this.category.category_name_es = category.category_es;
                    this.category.category_name_en = category.category_en;
                }
            }
        },
        computed: {
            CurrentCategory: function(){
                var _this = this;
                return this.categories.filter(function(category){
                   return category.id == _this.current_category;
                }) 
            }
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
                var _this = this;
                this.category.category_name_es = '';
                this.category.category_name_en = '';
                $('#'+modal).modal('hide');
                setTimeout(function(){
                    _this.errors.clear();
                }, 100);
            },
            addCategory:function(){
                this.view = 'create';
                this.openModal('CategoryModal');
            },
            saveCategory: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/categories/store', this.category).then(function(response){
                    _this.categories = response.data;
                    $.toast({
                        heading: 'Success',
                        text: 'La categoría ha sido guardada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                    _this.closeModal('CategoryModal');
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
            editCategory: function(id){
                this.current_category = id;
                this.view = 'edit';
                this.openModal('CategoryModal');
            },
            updateCategory: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/categories/update/' + this.current_category, this.category).then(function(response){
                    _this.categories = response.data;
                    $.toast({
                        heading: 'Success',
                        text: 'La categoría fue actualizada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                    _this.closeModal('CategoryModal');
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error actualizando la categoría.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            deleteCategory: function(id){
                var _this = this;
                swal({
                    title: "¿Estas seguro?",
                    text: "¡La categoría va a ser eliminada!",
                    // icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true,
                })
                .then(function(willDelete){
                    var _this_ = _this;
                    if (willDelete) {
                        axios.post( homepath + '/admin/maintenance/categories/delete/' + id).then(function(response){
                            _this.current_category = null;
                            _this_.categories = response.data;
                            $.toast({
                                heading: 'Success',
                                text: 'La categoría ha sido eliminada',
                                showHideTransition: 'fade',
                                icon: 'success',
                                position : 'top-right'
                            })
                        }).catch(function(error){
                            $.toast({
                                heading: 'Error',
                                text: 'Ocurrió un error eliminando la categoría.',
                                showHideTransition: 'fade',
                                icon: 'error',
                                position : 'top-right'
                            })
                        });
                    }
                });
            },
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
});