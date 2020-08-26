// 'use strict'
// $(document).ready(function(){
    Vue.use(VeeValidate);
    
    main = new Vue({
        el: 'main',
        data: {
            current_month_articles : current_month_articles,
            date : null,
            dt : null,
        },
        watch: {
            
        },
        computed: {
            
        },
        mounted: function(){
            var _this = this;
            this.date = moment().format('LL');
            this.initDataTable();
        },
        methods: {
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
                    data : this.current_month_articles,
                    columns: [
                        // {data : 'id'},
                        {data : 'title_es'},
                        {
                            data : 'authors',
                            render: function(data){
                                var author = '';
                                for (const ind in data) {
                                    if (ind >= 1) {
                                        author = author + " / " + data[ind]['name']; 
                                    } else {
                                        author = author + data[ind]['name']; 
                                    }
                                }
                                return author;
                            }
                        },
                        // {data : 'articles_count'},
                        {
                            data : 'created_at',
                            render: function(data){
                                return moment(data).format('L');
                            }
                        },
                        {
                            data : 'url_es',
                            render: function(data, row){
                                return "<div class='d-flex justify-content-around'><div class='badge'><a class='text-warning' target='_blank' href='" + homepath + "/articulo/" + data +"'><i class='fa fa-eye fa-lg fa-2x'></i></a></div></div>"
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