<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="container">

            <form>
                <h2>@{{form.title}}</h2>

                <fieldset v-for="(field, fieldIndex) in form.fields" class="block my-2">
                    <label>@{{field.title}}</label>
                    <input v-if="!field.repeatable" type="text" v-model="field.value" class="border border-gray-200 px-2 py-1" />
                    
                    <div v-if="field.repeatable && checkCondition(field)">
                        Repeater
                        <div v-for="(repeater, index) in field.value">
                            <input type="text" v-model="field.value[index]"  class="border border-gray-200 px-2 py-1" />
                            <button type="button" @click="clone(field)">Clone</button>
                            <button type="button" @click="removeClone(field, index)">Remove</button>
                        </div>
                    </div>
                </fieldset>
            </form>

            <pre>
            @{{form}}
            </pre>
        </div>
    </div>


    <script>
        var form = {
            id: 1,
            title: 'My form',
            fields: [
                {
                    id: 'first',
                    title: 'First',
                    description: 'First',
                    value: 2,
                    hidden: false
                },
                {
                    id: 'second',
                    title: 'Second',
                    description: 'Second',
                    value: 2,
                    hidden: false
                },
                {
                    id: 'field-1',
                    title: 'Field 1',
                    description: 'Field 1',
                    value: ['Foo', 'Bar', 'Baz'],
                    repeatable: true,
                    visible: 'field-2 = or'
                },
                {
                    id: 'card-1',
                    type: 'card',
                    fields: [
                        {
                            id: 'foo',
                            type: 'text',
                        },
                    ],
                    repeatable: true
                }
            ]
        };

        new Vue({
            el: '#app',
            data: {
                form: {}
            },
            mounted: function () {
                this.form = form;
            },
            methods: {
                checkCondition: function (field) {
                    const related = this.findField(this.form.fields, 'second');
                    
                    if (typeof related === 'undefined') {
                        return true;
                    }

                    if (related.hidden || related.value == 'o') {
                        return false; // Return false means hidden
                    }

                    return true; // Return true means visible
                },
                clone: function (field) {
                    field.value.push('');
                },
                removeClone: function (field, index) {
                    field.value.splice(index, 1);
                },
                getFieldValue: function (fieldId) {

                },
                findField: function (fields, id) {
                    return fields.find(field => {
                        if (field.id === id) {
                            return true;
                        } else if (field.fields) {
                            return this.findField(field.fields, id);
                        } else {
                            return false;
                        }
                    });
                },
                findFieldsById: function (fields, id) {
                    let output = [];

                    fields.forEach(field => {
                        if (field.id === id) {
                            output.push(field);
                        }

                        if (field.fields) {
                            output = output.concat(this.findFieldsById(field.fields, id));
                        }
                    });

                    return output;
                }
            },
        });
    </script>
</body>
</html>