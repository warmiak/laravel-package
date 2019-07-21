<template>
    <input v-if="active" :value="value"
           @input="$emit('input', $event.target.value)"
           class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" :placeholder="holder">
    <input v-else :value="value"
           @input="$emit('input', $event.target.value)"
           class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker bg-grey-lighter mb-3" :placeholder="holder" disabled>
</template>

<script>
    export default {
        name: "EditInput",
        data() {
            return {
                userInput: ''
            }
        },
        props: ['value', 'type', 'active', 'holder']
    }
</script>

<style scoped>

</style>