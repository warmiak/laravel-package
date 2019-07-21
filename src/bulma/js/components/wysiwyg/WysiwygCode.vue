<template>
    <textarea :value="getHtmlContent"
              @keyup="setCode"
              @blur="cleanCode"
              @click="cleanCode"
              ref="code"
              class="border-t border-grey-toolbar-border p-2 w-full bg-grey-toolbar text-blue-dark emmet-syntax-html emmet-profile-html"
              id="code"
              :class="(isFullscreen) ? 'absolute pin' : ''"
              :style="(isFullscreen) ? 'margin-top: 41px;' : 'min-height:' + height + 'px'">
            </textarea>
</template>

<script>
    import store from '../../store/index';
    let pretty = require('pretty');

    export default {
        name: "WysiwygCode",
        data() {
          return {
              count: ''
          }
        },
        props: {
            height: {
                type: Number
            }
        },
        computed: {
            getHtmlContent ( state ) {
                return store.state.htmlOutput;
            },
            isFullscreen ( state ) {
                return store.state.fullscreen
            }
        },
        methods: {
            setCode (){
                store.commit('set_html_input', this.$refs.code.value)
            },
            cleanCode() {
                store.commit('set_html_input', pretty(this.$refs.code.value, {ocd: true}))
            }

        },
        mounted() {
            // emmet.require('textarea').setup({
            //     pretty_break: true,
            //     use_tab: true
            // });
        }
    }
</script>

<style scoped>
</style>