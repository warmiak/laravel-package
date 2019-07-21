<template>
    <div class="flex my-1">
        <div class="mr-2">
            <span class="border rounded-full border-grey flex items-center cursor-pointer w-8" :class="toggle" @click="changePermission">
            <span class="rounded-full border w-4 h-4 border-grey bg-white shadow-inner shadow">
            </span>
        </span>
        </div>
        <div class="flex items-center">
            <p class="lg">{{ permission }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditPermission",
        data () {
            return {
                permissionActive: this.active
            }
        },
        props: ['active', 'permission', 'role'],
        computed: {
            toggle: function () {
                if (this.permissionActive) {
                    return 'bg-green justify-end'
                } else {
                    return 'justify-start'
                }
            }
        },
        methods: {
            changePermission() {
                axios.post('/admin/change/permission', {
                    role: this.role,
                    permission: this.permission,
                })
                    .then(response => {
                        if(this.permissionActive) {
                            this.permissionActive = false;
                        } else {
                            this.permissionActive = true;
                        }
                        swal(response.data.status, {
                            icon: "success",
                            buttons: false,
                            timer: 2500,
                        });
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

</style>