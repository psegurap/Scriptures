// $(document).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            tags : tags,
            categories : categories,
            series : series,
            collaborators : collaborators,
            summernote : null,
            dropzone : null,
            dropzone_galery : null,
            summernoteValue : null,
            filter: {
                category : '',
            },
            article : {
                title : null,
                content : null,
                img_thumbnail : null,
                tags: [],
                category: '',
                collaborator: '',
                attach_reference: '',
                short_description : '',
                serie : '',
                url : '',  
            },
            spinner : null,
            
        },
        mounted: function(){

            this.initSummernote();
            this.initDropzone();
            
            $( "#language-switch" ).change(function() {
                if(lang == 'es'){
                    window.location.href = homepath + "/language/en";
                }else{
                    window.location.href = homepath + "/language/es";
                }
            });


            this.article.attach_reference = this.randomString() + new Date().getTime();
            setTimeout(function(){
                $('.main-container').toggleClass("sidebar-closed");
            }, 100);


        },
        computed: {
            
        },
        watch : {
            
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
            SaveArticle(){
                var go_to_go = true;
                if(this.summernote.summernote('code').length < 500){
                    $.toast({
                    heading: 'Error',
                    text: 'La contenido es muy corto.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position : 'top-right'
                    });
                    go_to_go = false;
                }
                if(this.dropzone[0].dropzone.files.length == 0){
                    $.toast({
                        heading: 'Error',
                        text: 'Necesitas agregar una imagen.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position : 'top-right'
                    })
                    go_to_go = false;
                }
                if(go_to_go){
                    $("main").LoadingOverlay("show");
                    this.dropzone[0].dropzone.processQueue();
                }
            },
            SaveInformation: function(){
                this.article.content = this.summernote.summernote('code');
                this.article.img_thumbnail = this.dropzone[0].dropzone.files[0].name;
                main.dropzone[0].dropzone.removeAllFiles();
                
                axios.post(homepath + '/admin/articles/StoreArticle', {article_info : this.article}).then(function(response){
                    $("main").LoadingOverlay("hide");
                    swal({
                        text: "¡El articulo ha sido agregado!",
                        icon: "success",
                    }).then(function(){
                        window.location.href = homepath + '/admin/articles';
                    });
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
                    fontSizes: ['8', '9', '10', '11', '12', '14', '17', '18', '19', '20', '24'],
                    height: 500,
                    minHeight: 500,
                    maxHeight: 500,  
                    toolbar: [
                        // ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['style', ['style']],
                        ['fontsize', ['fontsize']],
                        ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
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
            // initDropzoneGalery:  function(){
            //     this.dropzone_galery = $("#galeryDropzone").dropzone({ 
            //         url: "/admin/blog/file/galery",
            //         uploadMultiple: true,
            //         paramName: "file",
            //         parallelUploads: 10,
            //         acceptedFiles: "image/*",
            //         autoProcessQueue: false,
            //         addRemoveLinks: true,
            //         dictDefaultMessage: `<i class="fa fa-hand-o-up mb-2" aria-hidden="true" style="font-size: 1.5em"></i><br/>
            //                             <span style="font-size: 1em">{{__('Drop or click here to upload your galery')}}</span>`,
            //         init : function(){
            //         var _this = this;
            //         this.on('error', function(file, error){
            //             _this.removeFile(file)
            //         //   toastr["error"](error, "Error");
            //         });
            //         this.on("successmultiple", function(file, response) {
            //             if(file){
            //                 console.log(file);
            //                 main.dropzone_galery[0].dropzone.removeAllFiles()
            //                 main.dropzone_default[0].dropzone.processQueue();
            //             }
            //         });
            //         }, 
            //     });
            // },
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
                    dictDefaultMessage: `<i class="fa fa-hand-o-up mb-2 text-white" aria-hidden="true" style="font-size: 1.5em"></i><br/>
                                        <span style="font-size: 1.2em; color:white;">Drop or click here to upload the picture</span>`,
                    init : function(){
                    var _this_ = _this;
                    this.on('error', function(file, error){
                        _this.removeFile(file)
                    //   toastr["error"](error, "Error");
                    });
                    this.on("success", function(file, response) {
                        if(file){
                            main.SaveInformation();
                            // $(".single-post-area").LoadingOverlay("hide");
                            //response bring the ID of just created trip
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
// });