<template>
    <div>
        <span v-if="seen">{{cond}}</span>
        <ol>
            <li v-for="t in todos" :key="t.id">
                {{t.task}}
            </li>
        </ol>
    <p>{{ msg }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>
    <ol>
        <input v-model="variable">
        <h5>{{variable}}</h5>
    </ol>
    </div>
</template>

<script>
    const default_layout = "default";

    export default {
        computed: {},
        data() {
            return {
                seen: true,
                cond:'conditional var',
                todos: [
                    {task: 'first task'},
                    {task: 'second task'},
                ],
                msg: 'This will be reversed',
                variable: 'User Input'
            }
        },
        methods: {
            reverseMessage: function (){
                this.msg = this.msg.split('').reverse().join('')
            }
        }
    };
</script>