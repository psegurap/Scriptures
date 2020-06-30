// 'use strict'
$(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            users : users,
            user_id : user_id,
            user : {
                name : null,
                email : null,
                admin : 0,
                filter : 0,
            },
            dt : null,
            view : 'create',
            current_user : null,
        },
        watch: {
            users : function(val){
                this.dt.clear()
                this.dt.rows.add(val);
                this.dt.draw();
            },
            'CurrentUser': function(val){
                let user = val[0];
                if(user){
                    this.user.name = user.name;
                    this.user.email = user.email;
                    this.user.admin = user.admin;
                    this.user.filter = user.filter;
                }
            }
        },
        computed: {
            CurrentUser: function(){
                var _this = this;
                return this.users.filter(function(user){
                   return user.id == _this.current_user;
                }) 
            }
        },
        mounted: function(){
            var _this = this;
            this.initDataTable();

            $('#checker-input').change(function(val){
                let permission = $(this).prop('checked');
                _this.updatePermission(_this.current_user, 'filter', permission);
            });

            $('#admin-input').change(function(val){
                let permission = $(this).prop('checked');
                _this.updatePermission(_this.current_user, 'admin', permission);
            });

        },
        methods: {
            openModal: function(modal){
                $('#'+modal).modal({
                    backdrop: 'static',
                    keyboard: false
                })
            },
            closeModal: function(modal){
                var _this = this;
                $("input[type=checkbox]").prop('checked', false);
                this.current_user = '';
                this.user.admin = 0;
                this.user.filter = 0;
                setTimeout(function(){
                    _this.errors.clear();
                }, 100);
            },
            addTag:function(){
                this.view = 'create';
                this.openModal('TagModal');
            },
            updatePermission: function(user, column, permission){
                let permission_update = {user : user, column : column, permission : permission}
                var _this = this;
                axios.post( homepath + '/admin/users/UpdatePermission', permission_update).then(function(response){
                    _this.users = response.data;
                }).catch(function(error){
                    $.toast({
                        heading: 'Error',
                        text: 'Ocurrió un error editando el permiso.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                });
            },
            editUser: function(id){
                this.current_user = id;
                this.openModal('PermissonsModal');
            },
            updateTag: function(){
                var _this = this;
                axios.post( homepath + '/admin/maintenance/tags/update/' + this.current_user, this.tag).then(function(response){
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
                            _this.current_user = null;
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
                    "oLanguage": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Showing page _PAGE_ of _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Search...",
                       "sLengthMenu": "Results :  _MENU_",
                    },
                    "stripeClasses": [],
                    data : this.users,
                    columns: [
                        // {data : 'id'},
                        {
                            // data : 'status',
                            render: function(data, type, row){
                                if(row.img_thumbnail != '' && row.img_thumbnail != null && row.attach_reference != '' && row.attach_reference != null){
                                    return "<img style='width:40px; border-radius:100%;' src=" + homepath + "/images/admin/" + row.attach_reference + "/" + row.img_thumbnail + "/>"
                                }else{
                                    return "<img class='border' style='width:40px; border-radius:100%;' src=" + homepath + "/images/admin/default_user.png/>"
                                }
                            }
                        },
                        {data : 'name'},
                        {data : 'email'},
                        {
                            data : 'id',
                            render: function(data, row){
                                // return "<div class='d-flex justify-content-around'><div class='text-info badge' ><i onclick='main.editTag("+data+")' style='cursor:pointer' class='fa fa-pencil-square-o fa-lg fa-2x'></i></div><div class='text-danger badge' ><i onclick='main.deleteTag("+data+")' style='cursor:pointer' class='fa fa-trash fa-lg fa-2x'></i></div></div>"
                                return "<button onclick='main.editUser("+data+")' class='btn btn-primary py-1 px-2'>Permissions</button>"
                            }
                        },
                        {
                            data : 'id',
                            render: function(data, row){
                                if (user_id == data) {
                                    return "<a class='text-info badge' href="+ homepath + "/admin/users/profile><i style='cursor:pointer' class='fa fa-pencil-square-o fa-lg fa-2x'></i><a>"
                                } else {
                                    return "<a disabled><i class='fa fa-pencil-square-o fa-lg fa-2x'></i><a>"
                                }
                                // return "<button onclick='main.editUser("+data+")' class='btn btn-primary py-1 px-2'>Permissions</button>"
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