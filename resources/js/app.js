/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
import { Form } from './form';

// EditorJS
import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header'; 
import List from '@editorjs/list'; 

// QuillJS
import VueQuillEditor from 'vue-quill-editor';

// Uppy
const Uppy = require('@uppy/core')
const Dashboard = require('@uppy/dashboard')
const DragDrop = require('@uppy/drag-drop')
const FileInput = require('@uppy/file-input')
const ProgressBar = require('@uppy/progress-bar')
const xhr = require('@uppy/xhr-upload')

window.Vue = require('vue');





Vue.use(VueQuillEditor, {
    theme: 'snow'
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        search: '',
        users: [],
        queue: [],
        
        // Content Type
        fields: [],

        // Editors
        richTexts: {},

        // Block Editors
        holders: {},
        editors: {}
    },
    mounted: function () {

        this.richTexts = window.richTexts;
        this.holders = window.holders;

        for (let holder in this.holders) {
            this.editors[holder] = new EditorJS({
                holderId: holder,
                tools: {
                    header: Header,
                    list: List
                },
                data: this.holders[holder],
            });
        }

        const uppyEnabled = document.getElementsByClassName('uppy').length;
        if (uppyEnabled) {
            const uppy = Uppy()
                .use(Dashboard, {
                    inline: true,
                    target: '.uppy'
                });

                uppy.on('complete', (result) => {
                    console.log('Upload complete! We’ve uploaded these files:', result.successful)
                });
        }

        const form = new Form();
        form.makeCollapse();
    },
    methods: {
        performSearch: _.debounce(function () {
            axios.get('/api/users?search=' + this.search).then(({data}) => {
                this.users = data;
            }).catch(error => {
                console.error(error);
            });
        }, 300),

        addToQueue: function (user) {
            this.queue.push(user);
        },

        removeFromQueue: function (index, user) {
            this.users.push(user);
            this.queue.splice(index, 1);
        },

        addField: function (type) {
            const field = {
                type,
                key: '',
                default: '',
                isRequired: false,
                isUnique: false,
                minLength: null,
                maxLength: null,
                attributes: []
            };

            this.fields.push(field);
        },

        saveContent: function () {
            
            if (!_.isEmpty(this.editors)) {
                for (let editor in this.editors) {
                    this.editors[editor].save().then(content => {
                        document.mainEditorForm.content.value = JSON.stringify(content);
                        document.mainEditorForm.submit();
                    }).catch(error => {
                        console.log(error);
                    });
                }
            } else {
                document.mainEditorForm.submit();
            }
        }
    }
});
