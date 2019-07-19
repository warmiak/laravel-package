<template>
    <div class="flex flex-col">
        <div class="flex justify-center">
            <img class="h-48 w-48 shadow border p-1" :src="picture" alt="Profile Avatar">
        </div>
        <div class="flex justify-center">
            <div class="my-4">
                <input class="inputfile inputfile-2" id="file" type="file" name="avatar" accept="image/*" @change="changeAvatar">
                <label for="file"><span id="filename" class="px-4">Choose File...</span></label>
            </div>
            <div class="flex items-center my-4">
                <button class="p-1 ml-2 border border-red text-red hover:bg-red hover:text-white"><i class="mdi mdi-delete mdi-24px" @click="deleteAvatar()"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditAvatar",
        props: ['user'],
        data() {
            return {
                picture: (this.user.profiles && this.user.profiles.avatar != null) ? '/storage/' + this.user.profiles.avatar : '/storage/profile/default.png'
            }
        },
        methods: {
            changeAvatar(e) {
                if(! e.target.files.length) return;

                let avatar = e.target.files[0];
                let reader = new FileReader();

                reader.readAsDataURL(avatar);

                reader.onload = e => {
                    this.picture = e.target.result;
                };

                this.saveAvatar(avatar);
            },
            saveAvatar(file) {
                let data = new FormData();
                data.append('avatar', file);
                data.append('user', this.user.id);

                axios.post('/admin/store/avatar', data)
                    .then(() =>
                        swal("Avatar uploaded !", {
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        })
                    )
                    .catch(error => {
                        swal('', {
                            icon: "error",
                            title: error,
                            dangerMode: true,
                        });
                    });
            },
            deleteAvatar() {
                let data = new FormData;
                data.append('user', this.user.id);
                axios.post('/admin/delete/avatar', data)
                    .then(() => {
                        this.picture = '/storage/profile/default.png';
                        swal("Avatar deleted !", {
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        })
                    })
                    .catch(error => {
                        swal('', {
                            icon: "error",
                            title: error,
                            dangerMode: true,
                        });
                    });

            }
        }
    }
</script>

<style scoped>
    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;

        z-index: -1;
        margin-top:10px;
    }
    .inputfile + label {

        /* 20px */
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        border: 1px solid #dbdbdb;
        height: 2.285em;
        box-shadow: inset 0 1px 2px rgba(10, 10, 10, 0.1);
        line-height: 1.5rem;
        border-radius: 3px;
        padding-top: 0.3em;

        /* 10px 20px */
    }
    .no-js .inputfile + label {
        display: none;
    }
    .inputfile:focus + label,
    .inputfile.has-focus + label {
        border-color: #1c3d5a;
    }
    .inputfile + label * {
        /* pointer-events: none; */
        /* in case of FastClick lib use */
    }
    .inputfile + label svg {
        width: 1em;
        height: 1em;
        line-height: 1.5rem;
        vertical-align: middle;
        margin-top: -0.25em;
        /* 4px */
        margin-right: 0.25em;
        /* 4px */
    }
    .inputfile-2 + label {
        border: 1px solid #dbdbdb;
    }
    .inputfile-2:focus + label,
    .inputfile-2.has-focus + label,
    .inputfile-2 + label:hover {
        border-color: #1c3d5a;
    }
</style>