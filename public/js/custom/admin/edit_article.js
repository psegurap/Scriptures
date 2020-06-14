$(window).ready(function(){
    Vue.use(VeeValidate);


    main = new Vue({
        el: 'main',
        data : {
            tags : tags,
            categories : categories,
            series : series,
            current_article: article,
            summernote : null,
            dropzone : null,
            dropzone_galery : null,
            summernoteValue : null,
            filter: {
                category : '',
            },
            article : {
                id : null,
                title : null,
                content : null,
                img_thumbnail : null,
                tags: [],
                category: '',
                attach_reference: '',
                short_description : '',
                serie : '',
                url : '',              
            },
            spinner : null,
            change_picture : false,
            
        },
        mounted: function(){

            this.initSummernote();
            this.initDropzone();
            $('.mdb-select').materialSelect();

            
            
            
            $( "#language-switch" ).change(function() {
                if(lang == 'es'){
                    window.location.href = homepath + "/language/en";
                }else{
                    window.location.href = homepath + "/language/es";
                }
            });

            this.article.id = this.current_article.id;
            if(lang == 'es'){
                this.article.title = this.current_article.title_es;
                this.article.content = this.current_article.full_content_es;
                this.article.short_description = this.current_article.short_description_es;
                this.article.url = this.current_article.url_es;
            }else{
                this.article.title = this.current_article.title_en;
                this.article.content = this.current_article.full_content_en;
                this.article.short_description = this.current_article.short_description_en;
                this.article.url = this.current_article.url_en;
            }

            this.article.category = this.current_article.categories.map(function(category){
                return category.category_id;
            });
            this.article.category = this.article.category.toString();

            this.article.tags = this.current_article.tags.map(function(tag){
                return tag.tag_id;
            });

            this.article.serie = this.current_article.series.map(function(serie){
                return serie.serie_id;
            });
            this.article.serie = this.article.serie.toString();

            this.summernote.summernote('code', this.article.content)
            this.article.attach_reference = this.current_article.picture_path;
            this.article.img_thumbnail = this.current_article.img_thumbnail;
            this.article.attach_reference = this.current_article.attach_reference;
        },
        computed: {
            
        },
        watch : {
            // 'article.category': function(val){
            //     console.log(val);
            // },
            
        },
        methods: {
            randomString: function(){
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < 20; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            },
            UpdateArticle(){
                var good_to_go = true;
                if(this.summernote.summernote('code').length < 500){
                    $.toast({
                    heading: 'Error',
                    text: 'La contenido es muy corto.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position : 'top-right'
                    });
                    good_to_go = false;
                }
                if(good_to_go){
                    if(this.dropzone[0].dropzone.files.length != 0){
                        $(".all_content").LoadingOverlay("show");
                        this.article.img_thumbnail = this.dropzone[0].dropzone.files[0].name;
                        this.dropzone[0].dropzone.processQueue();
                    }else{
                        $(".all_content").LoadingOverlay("show");
                        this.UpdateInformation();
                    }
                }
                
            },
            UpdateInformation: function(){
                this.article.content = this.summernote.summernote('code');
                this.article.url = this.article.title.replace(/ /gi, '-');
                
                
                axios.post(homepath + '/admin/articles/UpdateArticle', {article_info : this.article}).then(function(response){
                    $(".all_content").LoadingOverlay("hide");
                    window.location.reload();
                }).catch(function(error){
                    $(".all_content").LoadingOverlay("hide");
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
            initSummernote: function(){
                var HightlightButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fa fa-pencil"/> Highlight',
                    tooltip: 'Highlight text with red color',
                    click: function() {
                    context.invoke('editor.foreColor', 'red');
                    }
                });
                    return button.render();
                }
                var codigo = `<h6><span style="font-family: Arial; color: rgb(206, 198, 206);">Escribe la información del artículo...</span></h6>`;
                this.summernote = $('#summernote').summernote({
                    blockquoteBreakingLevel: 4,
                    placeholder: codigo,
                    tabsize: 2,
                    fontSizes: ['8', '9', '10', '11', '12', '14', '17', '18', '24'],
                    height: 500,
                    minHeight: 500,
                    maxHeight: 500,  
                    toolbar: [
                        // ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['style', ['style']],
                        ['fontsize', ['fontsize']],
                        ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
                        ['color', ['color']],
                        ['height', ['height']],
                        ['fontname', ['fontname']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video', 'hr']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    buttons: {
                        highlight: HightlightButton
                    }
                });
            },
            initDropzone: function(){
                var _this = this;
                this.dropzone = $("#Dropzone").dropzone({ 
                    url: "/admin/articles/files/storePicture",
                    uploadMultiple: true,
                    maxFiles:1,
                    paramName: "file",
                    // parallelUploads: 10,
                    acceptedFiles: "image/*",
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictDefaultMessage: `<i class="fa fa-hand-o-up mb-2" aria-hidden="true" style="font-size: 1.5em"></i><br/>
                                        <span style="font-size: 1em">Drop or click here to upload the picture</span>`,
                    init : function(){
                        var _this_ = _this;
                        this.on('error', function(file, error){
                            _this.removeFile(file)
                        //   toastr["error"](error, "Error");
                        });
                        this.on("success", function(file, response) {
                            if(file){
                                main.dropzone[0].dropzone.removeAllFiles();
                                main.UpdateInformation();
                                // $(".single-post-area").LoadingOverlay("hide");
                                //response bring the ID of just created article
                                // window.location.href = homepath + "/blog/" + response;
                            }
                        });
                    },
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
});