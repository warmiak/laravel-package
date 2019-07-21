<template>
    <div id="wysiwyg" :class="(isFullscreen) ? 'absolute pin' : 'relative'">

        <input type="hidden" :name="this.name" :value="getHtmlContent">

        <wysiwyg-toolbar></wysiwyg-toolbar>

        <wysiwyg-editor :height="editorheight" v-if="!editorModus"></wysiwyg-editor>

        <wysiwyg-code :height="editorheight" v-else></wysiwyg-code>

    </div>
</template>

<script>
    import store from '../../store/index';

    export default {
        name: "Wysiwyg",
        props: {
            html: {
                type: String,
                default: ""
            },
            name: {
                type: String,
                default: "body"
            },
            editorheight: {
                type: Number,
                default: 500
            }
        },
        data () {
            return {
                htmlInput: this.html
            }
        },
        computed: {
            getHtmlContent ( state ) {
                return store.state.htmlOutput
            },
            isFullscreen ( state ) {
                return store.state.fullscreen
            },
            editorModus ( state ) {
                return store.state.codeModus
            }
        }
    }
</script>

<style scoped>

</style>