// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            series : series,
            serie : {
                serie_name_es : null,
                serie_name_en : null,
            },
            dt : null,
            view : 'create',
            current_serie : null,
        },
        watch: {
            series : function(val){
                this.dt.clear()
                this.dt.rows.add(val);
                this.dt.draw();
            },
            'CurrentSerie': function(val){
                let serie = val[0];
                if(serie){
                    this.serie.serie_name_es = serie.serie_es;
                    this.serie.serie_name_en = serie.serie_en;
                }
            }
        },
        computed: {
            CurrentSerie: function(){
                var _this = this;
                return this.series.filter(function(serie){
                   return serie.id == _this.current_serie;
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
                this.serie.serie_name_es = '';
                this.serie.serie_name_en = '';
                $('#'+modal).modal('hide');
                setTimeout(function(){
                    _this.errors.clear();
                }, 100);
            },
            addSerie:function(){
                this.view = 'create';
                this.openModal('SerieModal');
            },
            saveSerie: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/series/store', this.serie).then(function(response){
                    _this.series = response.data;
                    $.toast({
                        heading: 'Success',
                        text: 'La serie ha sido guardada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                    _this.closeModal('SerieModal');
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error guardando la serie.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            editSerie: function(id){
                this.current_serie = id;
                this.view = 'edit';
                this.openModal('SerieModal');
            },
            updateSerie: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/series/update/' + this.current_serie, this.serie).then(function(response){
                    _this.series = response.data;
                    $.toast({
                        heading: 'Success',
                        text: 'La serie fue actualizada.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position : 'top-right'
                    })
                    _this.closeModal('SerieModal');
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error actualizando la serie.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            deleteSerie: function(id){
                var _this = this;
                swal({
                    title: "¿Estas seguro?",
                    text: "¡La serie va a ser eliminada!",
                    // icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true,
                })
                .then(function(willDelete){
                    var _this_ = _this;
                    if (willDelete) {
                        axios.post( homepath + '/admin/maintenance/series/delete/' + id).then(function(response){
                            _this.current_serie = null;
                            _this_.series = response.data;
                            $.toast({
                                heading: 'Success',
                                text: 'La serie ha sido eliminada',
                                showHideTransition: 'fade',
                                icon: 'success',
                                position : 'top-right'
                            })
                        }).catch(function(error){
                            $.toast({
                                heading: 'Error',
                                text: 'Ocurrió un error eliminando la serie.',
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
                    "oLanguage": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Showing page _PAGE_ of _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Search...",
                       "sLengthMenu": "Results :  _MENU_",
                    },
                    "stripeClasses": [],
                    data : this.series,
                    columns: [
                        // {data : 'id'},
                        {data : 'serie_es'},
                        {data : 'serie_en'},
                        {data : 'articles_count'},
                        {
                            data : 'status',
                            render: function(data){
                                if(data == 1){
                                    return "<span class='shadow-none badge badge-success'>Active</span>"

                                }else{
                                    return "<span class='shadow-none badge badge-danger'>Inactive</span>"
                                }
                            }
                        },
                        {
                            data : 'id',
                            render: function(data, row){
                                return "<div class='d-flex justify-content-around'><div class='text-info badge' ><i onclick='main.editSerie("+data+")' style='cursor:pointer' class='fa fa-pencil-square-o fa-lg fa-2x'></i></div><div class='text-danger badge' ><i onclick='main.deleteSerie("+data+")' style='cursor:pointer' class='fa fa-trash fa-lg fa-2x'></i></div></div>"
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