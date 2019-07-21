<template>
    <div :class="(isFullscreen) ? 'absolute pin bg-white' : ''" :style="(isFullscreen) ? 'margin-top: 41px;' : ''">
        <div  contenteditable="true"
              tabindex="0"
              spellcheck="true"
              :value="getHtmlContent"
              v-html="getHtmlContent"
              @input="setContent"
              @blur="changeFocus"
              v-once
              ref="editor"
              id="editor"
              class="border p-2 w-full bg-white inline-block h-full"
              :style="'min-height:' + height + 'px'">
            <p></p>
        </div>
    </div>
</template>

<script>
    import store from '../../store/index';

    export default {
        name: "WysiwygEditor",
        data () {
            return {
                selection: ''
            }
        },
        props: {
            html: {
                type: String
            },
            height: {
                type: Number
            }
        },
        computed: {
            getHtmlContent ( state ) {
                return store.state.htmlOutput
            },
            getCursorSelection ( state ) {
                return store.state.selection
            },
            isFullscreen ( state ) {
                return store.state.fullscreen
            }
        },
        methods: {
            setContent (){
                store.commit('set_html_input', this.$refs.editor.innerHTML)
            },
            changeFocus (){
                store.commit('change_focus', this.saveSelection())
            },
            saveSelection() {
                if (window.getSelection !== undefined) {
                    this.selection = window.getSelection();
                    if (this.selection.getRangeAt && this.selection.rangeCount) {
                        return this.selection.getRangeAt(0);
                    }
                } else if (document.selection && document.selection.createRange) {
                    return document.selection.createRange();
                }
                return null;
            },
            restoreSelection(range) {
                if (range) {
                    if (window.getSelection !== undefined) {
                        this.selection = window.getSelection();
                        this.selection.removeAllRanges();
                        this.selection.addRange(range);
                    }
                    else if (document.selection && range.select)
                        range.select();
                }
            },
            clearSelection() {
                this.selection = null;
                const selection = window.getSelection();
                if (selection) {
                    if (selection.empty !== undefined) {
                        selection.empty();
                    }
                    if (selection.removeAllRanges !== undefined) {
                        selection.removeAllRanges();
                    }
                }
            },
            onContentBlur () {
                // save focus to restore it later
                this.selection = this.saveSelection();
            },
        },
        created() {
            Event.$on('get-selection', () => {
                return this.restoreSelection(this.getCursorSelection);
            });

            document.execCommand('defaultParagraphSeparator', false, 'p');
        },
        mounted () {
            this.$refs.editor.addEventListener("blur", this.onContentBlur, { capture: true });
        },
        beforeDestroy () {
            this.$refs.editor.removeEventListener("blur", this.onContentBlur);
        }
    }
</script>

<style scoped>

</style>