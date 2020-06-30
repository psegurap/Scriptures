// $(window).ready(function(){
    Vue.use(VeeValidate);

    main = new Vue({
        el: 'main',
        data : {
            article : article,
            change_info : false,
            profile : {
                name : null,
                email : null,
                phone : null,
                attach_reference: null,
                img_thumbnail: null,
            }
        },
        mounted: function(){
            // this.profile.name = user.name;
            // this.profile.email = user.email;
            // this.profile.phone = user.phone;
            // this.profile.img_thumbnail = user.img_thumbnail;
            // if(user.attach_reference == '' || user.attach_reference == null){
            //     this.profile.attach_reference = this.randomString() + new Date().getTime();
            // }else{
            //     this.profile.attach_reference = user.attach_reference;
            // }

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
            UpdateProfile(){
                if(this.dropzone[0].dropzone.files.length != 0){
                    $("main").LoadingOverlay("show");
                    this.profile.img_thumbnail = this.dropzone[0].dropzone.files[0].name;
                    this.dropzone[0].dropzone.processQueue();
                }else{
                    $("main").LoadingOverlay("show");
                    this.UpdateInformation();
                }
            },
            UpdateInformation: function(){
                axios.post(homepath + '/admin/users/profile/UpdateProfile', {profile_info : this.profile}).then(function(response){
                    $("main").LoadingOverlay("hide");
                    swal({
                        text: "¡El usuario ha sido actualizado!",
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
                    url: "/admin/users/profile/files/StoreProfilePicture",
                    uploadMultiple: true,
                    maxFiles:1,
                    paramName: "file",
                    // parallelUploads: 10,
                    acceptedFiles: "image/*",
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictDefaultMessage: `<i class="fa fa-hand-o-up mb-2 text-white" aria-hidden="true" style="font-size: 1.5em"></i><br/>
                                        <span class="text-white" style="font-size: 1.2em">Drop or click here to change your picture</span>`,
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
// });