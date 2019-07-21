<template>
<div>
    <div role="button" class="inline-block select-none" :class="linkclass" @click="activeDropdown = !activeDropdown">
        <a class="text-white p-2 whitespace-no-wrap">Login</a>
    </div>
    <div v-show="activeDropdown" class="fixed pin flex items-center z-30">
        <div class="fixed pin bg-black opacity-75 z-40" @click="closeModal"></div>

        <div v-if="logUser" class="relative mx-6 mx-auto w-1/4 z-50 m-8">
            <div class="shadow-lg bg-white rounded p-4 overflow-hidden">
                <div class="text-right">
                    <button class="text-grey-dark hover:text-red p-px rounded-full" @click="closeModal"><i class="mdi mdi-close mdi-24px"></i></button>
                </div>
                <div class="text-center">
                    <i class="mdi mdi-account text-grey-dark" style="font-size: 8rem;"></i>
                </div>
                <div class="flex flex-col mb-3">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                           id="email" name="email" type="email" placeholder="E-Mail" v-model="login.email" @click="clearFeedback" autofocus>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                           id="password" name="password" type="password" placeholder="Password" v-model="login.password" @click="clearFeedback" @keyup.enter="loginUser">
                    <div class="flex -mx-2 mb-4">
                        <button class="shadow w-full border bg-white hover:border-green text-green py-2 px-4 mx-2 rounded" @click="loginUser">Login</button>
                        <button class="shadow w-full border bg-white hover:border-red text-red py-2 px-4 mx-2 rounded" @click="registerMenu">Register</button>
                    </div>
                    <a href="#" class="underline text-grey-darker hover:text-black" @click="resetMenu">Reset Password</a>
                </div>
                <div v-if="feedback">
                    <div class="flex bg-red-lighter shadow">

                        <div class="w-auto text-black items-center p-4">
                            <ul>
                                <li v-if="feedback.errors.email"><span class="leading-tight" v-text="feedback.errors.email[0]"></span></li>
                                <li v-if="feedback.errors.password"><span class="leading-tight" v-text="feedback.errors.password[0]"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div v-if="resetUser" class="relative mx-6 mx-auto w-1/4 z-50 m-8">
            <div class="shadow-lg bg-white rounded p-4 overflow-hidden">
                <div class="text-right">
                    <button class="text-grey-dark hover:text-red p-px rounded-full" @click="closeModal"><i class="mdi mdi-close mdi-24px"></i></button>
                </div>
                <div class="text-center">
                    <i class="mdi mdi-lock-reset text-grey-dark" style="font-size: 8rem;"></i>
                </div>
                <div class="flex flex-col mb-3">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                           id="reset-email" name="email" type="email" placeholder="E-Mail" v-model="reset.email" @click="clearFeedback" autofocus>
                    <div class="flex -mx-2">
                        <button class="shadow w-full border bg-white hover:border-green text-green py-2 px-4 mx-2 rounded" @click="resetPassword">Reset Password</button>
                        <button class="shadow w-full border bg-white hover:border-blue text-blue py-2 px-4 mx-2 rounded" @click="loginMenu"><i class="mdi mdi-arrow-left"></i> Back</button>
                    </div>
                </div>
                <div v-if="feedback">
                    <div class="flex bg-red-lighter shadow">

                        <div class="w-auto text-black items-center p-4">
                            <ul>
                                <li v-if="feedback.errors.email"><span class="leading-tight" v-text="feedback.errors.email[0]"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div v-if="regUser" class="relative mx-6 mx-auto w-1/4 z-50 m-8 animated infinite bounce">
            <div class="shadow-lg bg-white rounded p-4 overflow-hidden">
                <div class="text-right">
                    <button class="text-grey-dark hover:text-red p-px rounded-full" @click="closeModal"><i class="mdi mdi-close mdi-24px"></i></button>
                </div>
                <div class="text-center">
                    <i class="mdi mdi-account-plus text-grey-dark" style="font-size: 8rem;"></i>
                </div>
                <div class="flex flex-col mb-3">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" id="reg-name" name="name"
                           type="text" placeholder="Username" v-model="register.name" @click="clearFeedback" autofocus>

                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" id="reg-email" name="email"
                           type="email" placeholder="E-Mail" v-model="register.email" @click="clearFeedback">

                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" id="reg-password" name="password"
                           type="password" placeholder="Password" v-model="register.password" @click="clearFeedback">

                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" id="reg-retype-password" name="password_confirmation"
                           type="password" placeholder="Password Confirmation" v-model="register.password_confirmation" @click="clearFeedback">

                    <div class="flex -mx-2">
                        <button class="shadow w-full border bg-white hover:border-red text-red py-2 px-4 mx-2 rounded" @click="registerUser">Register</button>
                        <button class="shadow w-full border bg-white hover:border-blue text-blue py-2 px-4 mx-2 rounded" @click="loginMenu"><i class="mdi mdi-arrow-left"></i> Back</button>
                    </div>
                </div>
                <div v-if="feedback">
                    <div class="flex bg-red-lighter shadow">

                        <div class="w-auto text-black items-center p-4">
                            <ul>
                                <li v-if="feedback.errors.name"><span class="leading-tight" v-text="feedback.errors.name[0]"></span></li>
                                <li v-if="feedback.errors.email"><span class="leading-tight" v-text="feedback.errors.email[0]"></span></li>
                                <li v-if="feedback.errors.password"><span class="leading-tight" v-text="feedback.errors.password[0]"></span></li>
                                <li v-if="feedback.errors.password_confirmation"><span class="leading-tight" v-text="feedback.errors.password_confirmation[0]"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</template>

<script>
    export default {
        name: "LoginMenu",
        data () {
            return {
                activeDropdown: false,
                login: {},
                register: {},
                reset: {},
                feedback: '',
                logUser: true,
                regUser: false,
                resetUser: false
            }
        },
        props: ['linkclass'],
        methods: {
            loginUser() {
                axios.post('/login', this.login)
                    .then(() => location.reload())
                    .catch(error => {
                        this.feedback = error.response.data;
                    });
            },
            registerUser() {
                axios.post('/register', this.register)
                    .then(() => location.reload())
                    .catch(error => {
                        this.feedback = error.response.data;
                    });
            },
            resetPassword() {
                axios.post('/password/email', this.reset)
                    .then(() => location.reload())
                    .catch(error => {
                        this.feedback = error.response.data;
                    });
            },
            registerMenu() {
                this.regUser = true;
                this.logUser = false;
                this.resetUser = false;
                this.clearFeedback()
            },
            loginMenu() {
                this.logUser = true;
                this.regUser = false;
                this.resetUser = false;
                this.clearFeedback()
            },
            resetMenu() {
                this.resetUser = true;
                this.logUser = false;
                this.regUser = false;
                this.clearFeedback()
            },
            closeModal() {
                this.activeDropdown = false;
                this.logUser = true;
                this.regUser = false;
                this.resetUser = false;
                location.reload();
            },
            clearFeedback() {
                this.feedback = '';
            }
        }
    }
</script>

<style scoped>

</style>