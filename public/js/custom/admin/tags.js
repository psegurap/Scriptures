// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            tags : tags,
            tag : {
                tag_name_es : null,
                tag_name_en : null,
            },
            dt : null,
            view : 'create',
            current_tag : null,
        },
        watch: {
            tags : function(val){
                this.dt.clear()
                this.dt.rows.add(val);
                this.dt.draw();
            },
            'CurrentTag': function(val){
                let tag = val[0];
                if(tag){
                    this.tag.tag_name_es = tag.tag_es;
                    this.tag.tag_name_en = tag.tag_en;
                }
            }
        },
        computed: {
            CurrentTag: function(){
                var _this = this;
                return this.tags.filter(function(tag){
                   return tag.id == _this.current_tag;
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
                this.tag.tag_name_es = '';
                this.tag.tag_name_en = '';
                $('#'+modal).modal('hide');
                setTimeout(function(){
                    _this.errors.clear();
                }, 100);
            },
            addTag:function(){
                this.view = 'create';
                this.openModal('TagModal');
            },
            saveTag: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/tags/store', this.tag).then(function(response){
                    _this.tags = response.data;
                    $.toast({
                        heading: 'Success',
                        text: 'La etiqueta ha sido guardada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                    _this.closeModal('TagModal');
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error guardando la etiqueta.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            editTag: function(id){
                this.current_tag = id;
                this.view = 'edit';
                this.openModal('TagModal');
            },
            updateTag: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/tags/update/' + this.current_tag, this.tag).then(function(response){
                    _this.tags = response.data;
                    $.toast({
                        heading: 'Success',
                        text: 'La etiqueta fue actualizada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                    _this.closeModal('TagModal');
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error actualizando la etiqueta.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            deleteTag: function(id){
                var _this = this;
                swal({
                    title: "¿Estas seguro?",
                    text: "¡La etiqueta va a ser eliminada!",
                    // icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true,
                })
                .then(function(willDelete){
                    var _this_ = _this;
                    if (willDelete) {
                        axios.post( homepath + '/admin/maintenance/tags/delete/' + id).then(function(response){
                            _this.current_tag = null;
                            _this_.tags = response.data;
                            $.toast({
                                heading: 'Success',
                                text: 'La etiqueta ha sido eliminada',
                                showHideTransition: 'fade',
                                icon: 'success',
                                position : 'top-right'
                            })
                        }).catch(function(error){
                            $.toast({
                                heading: 'Error',
                                text: 'Ocurrió un error eliminando la etiqueta.',
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
                    data : this.tags,
                    // responsive : true,
                    columns: [
                        // {data : 'id'},
                        {data : 'tag_es'},
                        {data : 'tag_en'},
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
                                return "<div class='d-flex justify-content-around'><div class='text-info' style='font-size: 1.3em;'><i onclick='main.editTag("+data+")' style='cursor:pointer' class='fa fa-pencil-square-o' aria-hidden='true'></i></div><div class='text-danger' style='font-size: 1.3em';><i onclick='main.deleteTag("+data+")' style='cursor:pointer' class='fa fa-trash' aria-hidden='true'></i></div></div>"
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