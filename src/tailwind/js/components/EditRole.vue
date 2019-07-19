<template>
    <div class="flex flex-row items-center mb-3">
        <button @click="changeRole(user.name, role.name)" class="shadow bg-white">
            <i class="mdi mdi-power mdi-24px border p-1 pt-2" :class="(statusButton) ? 'text-green border-green' : 'text-red border-red'"></i>
        </button>
        <span class="ml-2">{{ role.label }}</span>
    </div>
</template>

<script>
    export default {
        name: "EditRole",
        data () {
            return {
                statusButton: this.status
            }
        },
        props: ['user', 'role', 'status'],
        methods: {
            changeRole(user, role) {
                axios.post('/admin/change/role', {
                    user: user,
                    role: role,
                })
                    .then(response => {
                        if(this.statusButton) {
                            this.statusButton = false;
                        } else {
                            this.statusButton = true;
                        }
                        swal(response.data.status, {
                            icon: "success",
                            buttons: false,
                            timer: 3500,
                        });
                    })
                    .catch(error => {
                        swal('', {
                            icon: "error",
                            title: error.response.data.message,
                            dangerMode: true,
                        });
                    });
            }
        },
    }
</script>

<style scoped>

</style>