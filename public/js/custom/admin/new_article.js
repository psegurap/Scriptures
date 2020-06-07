$(window).ready(function(){
    Vue.use(VeeValidate);

        // Dropzone.autoDiscover = false;

    main = new Vue({
        el: 'main',
        data : {
            // categories : categories,
            summernote : null,
            dropzone_galery : null,
            dropzone_default : null,
            summernoteValue : null,
            post : {
                title : null,
                content : null,
                img_thumbnail : null,
                categories: [],
                attach_reference: '',
                short_description : '',
                status : 0,              
            },
            spinner : null,
            // lang_check : '',
            
        },
        mounted: function(){

            this.initSummernote();
            // this.initDropzoneGalery();
            // this.initDefaultDropzone();

            // $( "#language-switch" ).change(function() {
            //     if(lang == 'es'){
            //         window.location.href = homepath + "/changeLanguage/en";
            //     }else{
            //         window.location.href = homepath + "/changeLanguage/es";
            //     }
            // });

            // $( "#active-switch" ).change(function(val) {
            //     var _this = this;
            //     if(val.target.checked){
            //         main.post.status = 1 
            //     }else{
            //         main.post.status = 0 
            //     }
            // });

            // this.post.attach_reference = this.randomString() + new Date().getTime();

        },
        watch : {
            // lang_check: function(val){
            //     console.log(val);
            // }
        },
        methods: {
            // randomString: function(){
            //     var result = '';
            //     var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            //     var charactersLength = characters.length;
            //     for ( var i = 0; i < 30; i++ ) {
            //         result += characters.charAt(Math.floor(Math.random() * charactersLength));
            //     }
            //     return result;
            // },
            // saveTrip(){
            //     var go_to_go = true;
            //     if(this.summernote.summernote('code').length < 500){
            //         $.toast({
            //         heading: 'Error',
            //         text: '{{__("Trip description is too small")}}',
            //         showHideTransition: 'fade',
            //         icon: 'error',
            //         position : 'top-right'
            //         });
            //         go_to_go = false;
            //     }

            //     if(this.dropzone_galery[0].dropzone.files.length == 0 || this.dropzone_default[0].dropzone.files.length == 0){
            //         $.toast({
            //         heading: 'Error',
            //         text: '{{__("Your galery or default picture is empty")}}',
            //         showHideTransition: 'fade',
            //         icon: 'error',
            //         position : 'top-right'
            //         })
            //         go_to_go = false;
            //     }

            //     if(go_to_go){
            //         $(".single-post-area").LoadingOverlay("show");
            //         this.post.content = this.summernote.summernote('code');
            //         this.post.img_thumbnail = this.dropzone_default[0].dropzone.files[0].name;
            //         axios.post(homepath + '/admin/blog/store', {post_info : this.post, lang : lang}).then(function(response){
            //         console.log(response.data);
            //         }).catch(function(error){
            //         console.log(error);
            //         });
            //         this.dropzone_galery[0].dropzone.processQueue();
            //     }
            // },
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
                    blockquoteBreakingLevel: 2,
                    placeholder: codigo,
                    tabsize: 2,
                    height: 500,
                    minHeight: 500,
                    maxHeight: 500,  
                    toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', [ 'paragraph']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview']],

                    ],
                    buttons: {
                    highlight: HightlightButton
                    }
                });
            },
            initDropzoneGalery:  function(){
                this.dropzone_galery = $("#galeryDropzone").dropzone({ 
                    url: "/admin/blog/file/galery",
                    uploadMultiple: true,
                    paramName: "file",
                    parallelUploads: 10,
                    acceptedFiles: "image/*",
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictDefaultMessage: `<i class="fa fa-hand-o-up mb-2" aria-hidden="true" style="font-size: 1.5em"></i><br/>
                                        <span style="font-size: 1em">{{__('Drop or click here to upload your galery')}}</span>`,
                    init : function(){
                    var _this = this;
                    this.on('error', function(file, error){
                        _this.removeFile(file)
                    //   toastr["error"](error, "Error");
                    });
                    this.on("successmultiple", function(file, response) {
                        if(file){
                            console.log(file);
                            main.dropzone_galery[0].dropzone.removeAllFiles()
                            main.dropzone_default[0].dropzone.processQueue();
                        }
                    });
                    }, 
                });
            },
            initDefaultDropzone: function(){
                var _this = this;
                this.dropzone_default = $("#defaultDropzone").dropzone({ 
                    url: "/admin/blog/file/default",
                    uploadMultiple: true,
                    maxFiles:1,
                    paramName: "file",
                    // parallelUploads: 10,
                    acceptedFiles: "image/*",
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictDefaultMessage: `<i class="fa fa-hand-o-up mb-2" aria-hidden="true" style="font-size: 1.5em"></i><br/>
                                        <span style="font-size: 1em">{{__('Drop or click here to upload your custom image')}}</span>`,
                    init : function(){
                    var _this_ = _this;
                    this.on('error', function(file, error){
                        _this.removeFile(file)
                    //   toastr["error"](error, "Error");
                    });
                    this.on("success", function(file, response) {
                        if(file){
                            main.dropzone_default[0].dropzone.removeAllFiles();
                            $(".single-post-area").LoadingOverlay("hide");
                            //response bring the ID of just created trip
                            window.location.href = homepath + "/blog/" + response;
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
                        text: '{{__("You need to fix the errors")}}',
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