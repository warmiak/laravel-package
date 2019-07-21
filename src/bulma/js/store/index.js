import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        htmlOutput: '',
        selection: '',
        fullscreen: false,
        codeModus: false
    },
    actions: {
        fetchHtmlInput () {
            //
        }
    },
    mutations: {
        set_html_input (state, html) {
            state.htmlOutput = html;
        },
        change_focus (state, range) {
            state.selection = range;
        },
        set_full_screen (state, value) {
            state.fullscreen = value
        },
        set_code_modus (state, value) {
            state.codeModus = value
        }
    }
});