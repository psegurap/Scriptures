// $(document).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            articles : articles,
            search_article : '',
            date : '',
        },
        mounted: function(){
            this.date = moment().format('YYYY-MM');
            flatpickr(document.getElementById('dateTimeFlatpickr'), {
                dateFormat: "Y-m",
            });
        },
        computed: {
            SearchedArticles: function(){
                var _this = this;
                return this.articles.filter(function(article){
                    if(_this.search_article.search("[\\[\\]?*+|{}\\\\()@.\n\r]")){
                        return article.title_es.toLowerCase().match(_this.search_article.toLowerCase()); 
                    }
                });
            }
        },
        watch : {
            
        },
        methods: {
            searchArticles: function(){
                var _this = this;
                $("main").LoadingOverlay("show");
                
                axios.post(homepath + '/admin/articles/reviews/searchReviews', {date : this.date}).then(function(response){
                    $("main").LoadingOverlay("hide");
                    _this.articles = response.data;
                    if(response.data.length > 0){
                        $.toast({
                            heading: 'Success',
                            text: 'Búsqueda con resultados.',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position : 'top-right'
                        })
                    }else{
                        $.toast({
                            heading: 'Warning',
                            text: 'Búsqueda sin resultados.',
                            showHideTransition: 'fade',
                            icon: 'warning',
                            position : 'top-right'
                        })
                    }
                }).catch(function(error){
                    $("main").LoadingOverlay("hide");
                    $.toast({
                        heading: 'Error',
                        text: 'Ha ocurrido un error.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                    console.log(error);
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
        },
    });
// });