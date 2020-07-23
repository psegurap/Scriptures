// $(document).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            // tags : tags,
            // categories : categories,
            // series : series,
            summernote : null,
            dropzone : null,
            dropzone_galery : null,
            summernoteValue : null,
            filter: {
                category : '',
            },
            collaborator : {
                nombre : null,
                email : null,
                img_thumbnail : null,
                country: '',
                attach_reference: '',
                phone : '',
                website : '',
                biography_es : '',              
                biography_en : '',              
            },
            
        },
        mounted: function(){
            
            this.initDropzone();

            // this.$nextTick(function(){
            //     $('.selectpicker').selectpicker();
            // });

            this.collaborator.attach_reference = this.randomString() + new Date().getTime();

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
            SaveCollaborator(){
                var go_to_go = true;
                if(this.dropzone[0].dropzone.files.length > 0){
                    $("main").LoadingOverlay("show");
                    this.collaborator.img_thumbnail = this.dropzone[0].dropzone.files[0].name;
                    this.dropzone[0].dropzone.processQueue();

                }else{
                    $("main").LoadingOverlay("show");
                    this.collaborator.img_thumbnail = '---';
                    this.SaveInformation();
                }
                
            },
            SaveInformation: function(){
                main.dropzone[0].dropzone.removeAllFiles();
                axios.post(homepath + '/admin/collaborators/StoreCollaborator', {collaborator : this.collaborator}).then(function(response){
                    $("main").LoadingOverlay("hide");
                    swal({
                        text: "¡El colaborador ha sido agregado!",
                        icon: "success",
                    }).then(function(){
                        window.location.href = homepath + '/admin/collaborators';
                    });
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
            initDropzone: function(){
                var _this = this;
                this.dropzone = $("#Dropzone").dropzone({ 
                    url: "/admin/collaborators/files/storePicture",
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