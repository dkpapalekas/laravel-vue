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
                message:'fromaxios'
            }
        },
        async mounted() {
            this.message = await axios.get('/gtest')
                .then(x => x.data)
                .catch(e => e)
        }
    };
</script>
