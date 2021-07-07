<template>
    <div>
        {{message}}
    </div>
</template>

<script>
    const default_layout = "default";
    import axios from 'axios';

    export default {
        computed: {},
        data() {
            return {
                message:'Hello World'
            }
        },
        mounted() {
            axios.post('/test', {
                email: 'test@test.com',
                name: 'Flintstone',
                password: '1234abcd'
            })
        }
    };
</script>
