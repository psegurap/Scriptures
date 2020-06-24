// $(document).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            member : member,
            summernote : null,
            dropzone : null,
            summernoteValue : null,
            member : {
                nombre : null,
                email : null,
                role_es: null,
                role_en: null,
                img_thumbnail : null,
                country: '',
                attach_reference: '',
                website : '',
                facebook : null,                            
                instagram : null,                            
                twitter : null,                            
                youtube : null,                            
            },
            change_picture : false,
        },
        mounted: function(){
            this.member.nombre = member.name;
            this.member.email = member.email;
            this.member.role_es = member.role;
            this.member.role_en = member.role_en;
            this.member.country = member.country;
            this.member.website = member.website;
            this.member.facebook = member.facebook;
            this.member.instagram = member.instagram;
            this.member.twitter = member.twitter;
            this.member.youtube = member.youtube;
            this.member.img_thumbnail = member.img_thumbnail;
            this.member.attach_reference = member.attach_reference;

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
            UpdateMember(){
                if(this.dropzone[0].dropzone.files.length != 0){
                    $("main").LoadingOverlay("show");
                    this.member.img_thumbnail = this.dropzone[0].dropzone.files[0].name;
                    this.dropzone[0].dropzone.processQueue();
                }else{
                    $("main").LoadingOverlay("show");
                    this.UpdateInformation();
                }
                
            },
            UpdateInformation: function(){
                axios.post(homepath + '/admin/team/UpdateTeam/' + member.id, {member : this.member}).then(function(response){
                    $("main").LoadingOverlay("hide");
                    swal({
                        text: "¡El miembro ha sido actualizado!",
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
                    url: "/admin/team/files/storePicture",
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