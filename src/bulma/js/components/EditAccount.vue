<template>
    <div>

        <div class="flex" v-if="account.confirmed">

            <div class="w-1/4">
                <edit-avatar :user="account"></edit-avatar>
            </div>

            <div class="w-1/2 px-4">
                <edit-input type="text" :active="0" :value="account.name"></edit-input>
                <edit-input type="text" :active="0" :value="account.email"></edit-input>
                <edit-input type="text" :active="1" :value="(account.profiles) ? account.profiles.firstname : ''" v-model="profile.firstname" holder="Firstname"></edit-input>
                <edit-input type="text" :active="1" :value="(account.profiles) ? account.profiles.lastname : ''" v-model="profile.lastname" holder="Lastname"></edit-input>
                <edit-input type="text" :active="1" :value="(account.profiles) ? account.profiles.jobtitle : ''" v-model="profile.jobtitle" holder="Jobtitle"></edit-input>
                <edit-input type="text" :active="1" :value="(account.profiles) ? account.profiles.company : ''" v-model="profile.company" holder="Company"></edit-input>

                <button type="submit" class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded" @click="saveProfile(account.name)">Save Profile</button>
            </div>


            <div class="w-1/4 flex flex-col p-1 px-6">
                <edit-role :user="account" :role="role" :status="role.status" v-for="role in roles" :key="role.id"></edit-role>
                <div class="border-t pt-3 flex flex-row items-center">
                    <button class="shadow bg-white">
                        <i class="mdi mdi-power mdi-24px border p-1 pt-2" :class="(account.active) ? 'text-green border-green' : 'text-red border-red'" @click="changeUserStatus()"></i>
                    </button>
                    <span class="ml-2">Account Status</span>
                </div>
            </div>


        </div>


        <div v-else class="w-full">
            <div class="flex bg-red-lighter mb-4">
                <div class="w-16 bg-red">
                    <div class="p-4">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" fill="#FFF"/><path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z" fill="#FFF"/><path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z" fill="#FFF"/></svg>
                    </div>
                </div>
                <div class="w-auto text-black opacity-75 items-center p-4">
                    <p class="text-lg font-bold pb-4 uppercase">Account is not confirmed and has no Profile !</p>
                    <table class="leading-tight">
                        <tr>
                            <td>Username</td>
                            <td>{{ account.name }}</td>
                        </tr>
                        <tr>
                            <td class="w-32">E-Mail</td>
                            <td>{{ account.email }}</td>
                        </tr>
                        <tr>
                            <td>active</td>
                            <td>{{ (account.active) ? 'true' : 'false' }}</td>
                        </tr>
                        <tr>
                            <td>Confirmed</td>
                            <td>{{ (account.confirmed) ? 'true' : 'false' }}</td>
                        </tr>
                        <tr>
                            <td>Created</td>
                            <td>{{ humanDate }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: "EditAccount",
        data () {
            return {
                createdAt: '',
                buttonState: '',
                profile: {},
                output: []
            }
        },
        props: {
            account: Object,
            roles: Array
        },
        computed: {
            humanDate() {
                let date = new Date(this.account.created_at);
                return date.toLocaleString();
            }
        },
        methods: {
            changeUserStatus() {
                swal({
                    title: "Changing Account Status",
                    text: "This action will disable the Account !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.post('/admin/change/user-status', {
                                username: this.account.name
                            })
                                .then(response => {
                                    swal(response.data.status, {
                                        icon: "success",
                                        buttons: false,
                                        timer: 1500
                                    });
                                    setTimeout(function () {
                                        location.reload()
                                    }, 1500);
                                })
                                .catch(error => {
                                    swal('', {
                                        icon: "error",
                                        title: error.response.data.message,
                                        dangerMode: true,
                                    });
                                });
                        } else {
                            swal("", {
                                icon: "info",
                                title: 'Account Status unchanged'
                            });
                        }
                    });
            },
            saveProfile(user) {
                let formData = new FormData();

                formData.append('username', user);

                for (let key in this.profile)
                {
                    formData.append(key, this.profile[key]);
                }

                axios.post('/admin/change/profile', formData)
                    .then(response => {
                        swal(response.data.status, {
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    })
                    .catch(error => {

                        for(let value in error.response.data.errors) {
                            this.output.push(error.response.data.errors[value]);
                        }

                        this.output.push(error.response.data.message);

                        swal('', {
                            icon: "error",
                            dangerMode: true,
                            title: this.output
                        });
                    });

            }
        }
    }
</script>

<style scoped>

</style>