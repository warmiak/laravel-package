<template>
    <div class="relative">
        <div role="button" class="inline-block select-none" :class="linkclass" @click="activeDropdown = !activeDropdown">
            <a class="text-black md:text-white p-2 md:p-4 whitespace-no-wrap" >{{ username }} <i class="mdi mdi-menu-down"></i></a>
        </div>
        <div class="absolute pin-r w-48 mt-2">
            <div class="bg-white shadow rounded border overflow-hidden" v-show="activeDropdown">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserMenu",
        data () {
            return {
                activeDropdown: false
            }
        },
        props: ['linkclass', 'username']
    }
</script>

<style scoped>

</style>