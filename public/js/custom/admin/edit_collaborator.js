// $(document).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            collaborator : collaborator,
            summernote : null,
            dropzone : null,
            summernoteValue : null,
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
            change_picture : false,
        },
        mounted: function(){
            this.collaborator.nombre = collaborator.name;
            this.collaborator.email = collaborator.email;
            this.collaborator.country = collaborator.country;
            this.collaborator.phone = collaborator.phone;
            this.collaborator.website = collaborator.website;
            this.collaborator.biography_es = collaborator.info_es;
            this.collaborator.biography_en = collaborator.info_en;
            this.collaborator.img_thumbnail = collaborator.img_thumbnail;
            this.collaborator.attach_reference = collaborator.attach_reference;

            this.initDropzone();

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
            UpdateCollaborator(){
                if(this.dropzone[0].dropzone.files.length != 0){
                    $("main").LoadingOverlay("show");
                    this.collaborator.img_thumbnail = this.dropzone[0].dropzone.files[0].name;
                    this.dropzone[0].dropzone.processQueue();
                }else{
                    $("main").LoadingOverlay("show");
                    this.UpdateInformation();
                }
                
            },
            UpdateInformation: function(){
                axios.post(homepath + '/admin/collaborators/UpdateCollaborator/' + collaborator.id, {collaborator : this.collaborator}).then(function(response){
                    $("main").LoadingOverlay("hide");
                    swal({
                        text: "¡El colaborador ha sido actualizado!",
                        icon: "success",
                    }).then(function(){
                        window.location.reload();
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
                            main.UpdateInformation();
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