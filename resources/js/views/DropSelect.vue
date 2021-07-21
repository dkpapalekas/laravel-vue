<template>
    <div>
            <b-form-select v-model="selected" :options="options"></b-form-select>
            <div class="mt-3">Selected: <strong>{{ selected }}</strong></div>

             <b-row class='my-3'>
                <b-button v-on:click="showAllVehicles">Show all vehicles</b-button>
            </b-row>
            <b-row>
                <b-table class='mx-3' striped hover :items="allVehicles" :fields='fields'></b-table>
            </b-row>
    </div>

</template>

<script>
    const default_layout = "default";
    import axios from 'axios';

    export default {
        computed: {},
        data() {
            return {
                allVehicles: [],
                selected: null,
                options: [],
                fields: ['id', 'lic_plate', 'brand', 'model', 'km_tracker'],
            }
        },
        methods: {
            /* newVehicle() {
                axios.post('/vehicle', {
                    lic_plate: this.lic_plate,
                    brand: this.brand,
                    model: this.model,
                    km_tracker: this.km_tracker,
                })
                .then(this.showAllVehicles());
            }, */


            showAllVehicles() {
                axios.get('/vehicles')
                .then(r => {this.allVehicles = r.data})

                this.options = this.allVehicles.map(function(obj) {
                    obj['text'] = obj['model'];
                    obj['value'] = obj['id']; // Assign new key
                    delete obj['mod'];
                    delete obj['id'];
                    delete obj['lic_plate'];
                    delete obj['km_tracker'];// Delete old key
                    return obj;
                });

                console.log(this.options)
            },

        },

        async mounted() {
            this.showAllVehicles()
        }
    };
</script>
