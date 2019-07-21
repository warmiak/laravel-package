<template>
    <div id="toolbar" class="flex flex-wrap p-2 bg-grey-toolbar shadow" :class="(isFullscreen) ? 'absolute pin-t w-full z-50' : ''">

        <div v-if="linkMenu" id="toolbox-link" class="absolute z-50 pin" style="background-color: rgba(0,0,0,0.7)">
            <div class="relative mx-8 p-4 shadow-lg  bg-white" style="top: 60px; width: 450px;">
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" placeholder="http://example.com"
                       v-model="linkUrl" autofocus>
                <button class="bg-green hover:bg-green-dark text-white p-1 rounded" @click="insertLink(linkUrl)">Insert</button>
                <button class="bg-red hover:bg-red-dark text-white p-1 rounded" @click="linkMenu = false">Cancel</button>
            </div>
        </div>

        <div v-if="imageMenu" id="toolbox-image" class="absolute z-50 pin" style="background-color: rgba(0,0,0,0.7)">
            <div class="relative flex mx-8 p-4 shadow-lg text-right bg-white" style="top: 60px; width: 234px;">
                <div class="overflow-hidden relative">
                    <button class="bg-green hover:bg-green-dark text-white text-sm py-1 px-4 w-full inline-flex items-center rounded">
                        <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                        </svg>
                        <span class="ml-2">Select Image</span>
                    </button>
                    <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" type="file" name="avatar" accept="image/*" @change="insertImage">
                </div>
                <!--<input class="inputfile inputfile-2" id="file" type="file" name="avatar" accept="image/*" @change="insertImage">-->
                <div class="ml-2">
                    <button class="bg-red hover:bg-red-dark text-white p-1 rounded" @click="imageMenu = false">Cancel</button>
                </div>
            </div>
        </div>

        <div class="relative border-r border-grey-toolbar-border px-1">
            <button class=" text-white border border-grey-toolbar hover:border-white flex items-center" @click="mediaMenuToggle()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-plus mdi-toolbar -mr-1"></i><i class="mdi mdi-menu-down" :class="(editorModus) ? 'text-grey-toolbar-border' : 'text-white'"></i>
            </button>
            <div v-if="mediaMenu" class="absolute z-40">

                <div class="flex flex-col mt-1 shadow-lg z-50 py-2 bg-grey-lightest border-t">
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center w-full" @click="openLinkMenu()">
                            <i class="mdi mdi-link mdi-toolbar"></i><span class="ml-4">Link...</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center w-full" @click="openImageMenu()">
                            <i class="mdi mdi-image mdi-toolbar"></i><span class="ml-4">Bild...</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center w-full" @click="insertVideo()">
                            <i class="mdi mdi-video mdi-toolbar"></i><span class="ml-4">Video...</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center w-full" @click="imageBrowser()">
                            <i class="mdi mdi-folder-multiple-image mdi-toolbar"></i><span class="ml-4">ImageBrowser...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-r border-grey-toolbar-border px-1">
            <button class="text-white border border-grey-toolbar hover:border-white" @click="formatTextBold()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-bold mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" @click="formatTextItalic()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-italic mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" @click="formatTextUnderline()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-underline mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" @click="formatTextQuote()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-quote-close mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" @click="formatTextCode()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-code-tags mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" @click="insertHorizontalRule()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-minus mdi-toolbar"></i>
            </button>
        </div>

        <div class="relative border-r border-grey-toolbar-border px-1">
            <button class=" text-white border border-grey-toolbar hover:border-white flex items-center" @click="textMenuToggle()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                {{ headerStyle }}<i class="mdi mdi-menu-down mdi-toolbar" :class="(editorModus) ? 'text-grey-toolbar-border' : 'text-white'"></i>
            </button>
            <div v-if="textMenu" class="absolute z-40">

                <div class="flex flex-col mt-1 shadow-lg z-50 py-2 bg-grey-lightest border-t">
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="insertParagraph()">
                            <i class="mdi mdi-format-paragraph mdi-toolbar"></i><span class="ml-4 flex whitespace-no-wrap">Paragraph</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatHeader('<h1>')">
                            <i class="mdi mdi-format-header-1 mdi-toolbar"></i><span class="ml-4 flex whitespace-no-wrap">Heading 1</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatHeader('<h2>')">
                            <i class="mdi mdi-format-header-2 mdi-toolbar"></i><span class="ml-4 flex whitespace-no-wrap">Heading 2</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatHeader('<h3>')">
                            <i class="mdi mdi-format-header-3 mdi-toolbar"></i><span class="ml-4 flex whitespace-no-wrap">Heading 3</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatHeader('<h4>')">
                            <i class="mdi mdi-format-header-4 mdi-toolbar"></i><span class="ml-4 flex whitespace-no-wrap">Heading 4</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="relative border-r border-grey-toolbar-border px-1">
            <button class="text-white border border-grey-toolbar hover:border-white flex items-center" @click="fontMenuToggle()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-title mdi-toolbar -mr-1"></i><i class="mdi mdi-menu-down" :class="(editorModus) ? 'text-grey-toolbar-border' : 'text-white'"></i>
            </button>
            <div v-if="fontMenu" class="absolute z-40">
                <div class="flex flex-col mt-1 shadow-lg z-50 py-2 bg-grey-lightest border-t">

                    <div class="hover:bg-grey-light p-2 flex justify-between items-center">
                        <button class=" flex items-center" onclick="document.execCommand('strikeThrough',false,'')">
                            <i class="mdi mdi-format-font mdi-toolbar"></i><span class="ml-4">Schrift</span>
                        </button>
                        <i class="mdi mdi-chevron-right mdi-toolbar"></i>
                    </div>
                    <div class="flex p-2">
                        <input type="text" class="border w-1/3 mr-2 text-center" v-model="fontSize"><span>px</span>
                        <div class="flex justify-center">
                            <button class="hover:bg-grey-light" @click="increaseFontSize()"><i class="mdi mdi-plus mdi-toolbar"></i></button>
                            <button class="hover:bg-grey-light" @click="decreaseFontSize()"><i class="mdi mdi-minus mdi-toolbar"></i></button>
                        </div>
                    </div>
                    <div class="hover:bg-grey-light p-2 flex justify-between items-center">
                        <button class=" flex items-center" onclick="document.execCommand('strikeThrough',false,'')">
                            <i class="mdi mdi-palette mdi-toolbar"></i><span class="ml-4">Farbe</span>
                        </button>
                        <i class="mdi mdi-chevron-right mdi-toolbar"></i>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatSuperscript()">
                            <i class="mdi mdi-format-superscript mdi-toolbar"></i><span class="ml-4">Hochgestellt</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatSubscript()">
                            <i class="mdi mdi-format-subscript mdi-toolbar"></i><span class="ml-4">Tiefgestellt</span>
                        </button>
                    </div>
                    <div class="hover:bg-grey-light p-2">
                        <button class=" flex items-center" @click="formatStrikeThrough()">
                            <i class="mdi mdi-format-strikethrough mdi-toolbar"></i><span class="ml-4">Durchgestrichen</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="border-r border-grey-toolbar-border px-1">
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('insertUnorderedList',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-list-bulleted mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('insertOrderedList',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-list-numbers mdi-toolbar"></i>
            </button>
        </div>

        <div class="border-r border-grey-toolbar-border px-1">
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('justifyLeft',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-align-left mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('justifyCenter',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-align-center mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('justifyRight',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-format-align-right mdi-toolbar"></i>
            </button>
        </div>

        <div class="border-r border-grey-toolbar-border px-1">
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('undo',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-undo mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('redo',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-redo mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('removeFormat',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-eraser mdi-toolbar"></i>
            </button>
            <button class="text-white border border-grey-toolbar hover:border-white" onclick="document.execCommand('delete',false,'')"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-delete mdi-toolbar"></i>
            </button>
        </div>

        <div class="border-r border-grey-toolbar-border px-1">
            <button class="border border-grey-toolbar hover:border-white" :class="(editorModus) ? 'text-blue-dark hover:border-blue-dark' : 'text-white'" @click="switchDisplayMode()">
                <i class="mdi mdi-code-braces mdi-toolbar"></i>
            </button>
            <button class="border border-grey-toolbar hover:border-white" :class="(isFullscreen) ? 'text-blue-dark hover:border-blue-dark' : 'text-white'" @click="switchFullscreen()">
                <i class="mdi mdi-arrow-expand mdi-toolbar"></i>
            </button>
        </div>

        <div class="relative px-1">
            <button class="text-white border border-grey-toolbar hover:border-white" @click="infoMenuToggle()"
                    :class="(editorModus) ? 'text-grey-toolbar-border hover:border-grey-toolbar' : 'text-white'" :disabled="editorModus">
                <i class="mdi mdi-information-outline mdi-toolbar"></i>
            </button>
            <div v-if="infoMenu" class="absolute pin-r z-40">
                <div class="mt-1 shadow-lg z-40 bg-white border-t">
                    <div class="p-8 text-center">
                        <em class="whitespace-no-wrap">created by Piotr "<a href="https://orendo.de" target="_blank">warmiak</a>" Wolkiewicz</em>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import store from '../../store/index';

    export default {
        name: "WysiwygToolbar",
        data() {
            return {
                textMenu: false,
                mediaMenu: false,
                fontMenu: false,
                infoMenu: false,

                linkMenu: false,
                imageMenu: false,
                videoMenu: false,
                imageBrowserMenu: false,

                headerStyle: 'Paragraph',
                fontSize: 24,
                linkUrl: ''
            }
        },
        computed: {
            isFullscreen ( state ) {
                return store.state.fullscreen
            },
            editorModus ( state ) {
                return store.state.codeModus
            }
        },
        methods: {
            getSelection () {
                Event.$emit('get-selection')
            },
            setContent (content){
                store.commit('set_html_input', content)
            },


            // Media Menu
            mediaMenuToggle() {
                if (this.mediaMenu) {
                    return this.mediaMenu = false;
                } else {
                    this.textMenu = false;
                    this.fontMenu = false;
                    this.infoMenu = false;
                    return this.mediaMenu = true;
                }
            },
            openLinkMenu() {
                this.mediaMenuToggle();
                this.linkMenu = true;
                this.linkUrl = '';
            },
            openImageMenu() {
                this.mediaMenuToggle();
                this.imageMenu = true;
                this.linkUrl = '';
            },
            insertLink(url) {
                this.getSelection();
                document.execCommand('createLink',false, url);
                this.linkMenu = false;
            },
            insertImage(e) {
                if(! e.target.files.length) return;

                let avatar = e.target.files[0];
                let reader = new FileReader();

                reader.readAsDataURL(avatar);

                this.getSelection();

                reader.onload = e => {
                    document.execCommand('insertImage',false, e.target.result);
                };
                this.imageMenu = false;
            },
            insertVideo() {
                document.execCommand('createLink',false,'http://orendo.de');
                this.mediaMenuToggle();
            },
            imageBrowser() {
                document.execCommand('createLink',false,'http://orendo.de');
                this.mediaMenuToggle();
            },


            // Format Text
            formatTextBold() {
                this.getSelection();
                document.execCommand('bold', false, '');
            },
            formatTextItalic() {
                this.getSelection();
                document.execCommand('italic', false, '');
            },
            formatTextUnderline() {
                this.getSelection();
                document.execCommand('underline', false, '');
            },
            formatTextQuote() {
                this.getSelection();
                document.execCommand('formatBlock', false, 'BLOCKQUOTE');
            },
            formatTextCode() {
                this.getSelection();
                document.execCommand('formatBlock', false, 'PRE');
            },
            insertHorizontalRule() {
                this.getSelection();
                document.execCommand('insertHorizontalRule', false, '');
            },


            // Text Menu
            textMenuToggle() {
                if (this.textMenu) {
                    return this.textMenu = false;
                } else {
                    this.fontMenu = false;
                    this.mediaMenu = false;
                    this.infoMenu = false;
                    return this.textMenu = true;
                }
            },
            insertParagraph() {
                this.getSelection();
                document.execCommand('insertParagraph',false,'');
                this.textMenuToggle();
            },
            formatHeader(type) {
                this.getSelection();
                document.execCommand('formatBlock',false,type);
                this.textMenuToggle();
            },



            // Font Menu
            fontMenuToggle() {
                if (this.fontMenu) {
                    return this.fontMenu = false;
                } else {
                    this.textMenu = false;
                    this.mediaMenu = false;
                    this.infoMenu = false;
                    return this.fontMenu = true;
                }
            },
            increaseFontSize() {
                return this.fontSize = this.fontSize - 1;
            },
            decreaseFontSize() {
                return this.fontSize = this.fontSize - 1;
            },
            formatSuperscript() {
                this.getSelection();
                this.fontMenuToggle();
                document.execCommand('superscript',false,'');
            },
            formatSubscript() {
                this.getSelection();
                this.fontMenuToggle();
                document.execCommand('subscript',false,'')
            },
            formatStrikeThrough() {
                this.getSelection();
                this.fontMenuToggle();
                document.execCommand('strikeThrough',false,'')
            },


            // Display Mode
            switchDisplayMode() {
                if (this.editorModus) {
                    store.commit('set_code_modus', false);
                } else {
                    store.commit('set_code_modus', true);
                }
            },
            switchFullscreen() {
                if (this.isFullscreen) {
                    store.commit('set_full_screen', false);
                } else {
                    store.commit('set_full_screen', true);
                }
            },


            // Info Menu
            infoMenuToggle() {
                if (this.infoMenu) {
                    return this.infoMenu = false;
                } else {
                    this.textMenu = false;
                    this.mediaMenu = false;
                    this.fontMenu = false;
                    return this.infoMenu = true;
                }
            },
        }
    }
</script>

<style scoped>
    .mdi-toolbar {
        font-size: 20px;
    }
</style>