<template>
    <div>
        <b-form-input v-model="lic_plate" placeholder="licence plate"></b-form-input>
        <b-button v-on:click="newVehicle">Press to add Vehicle</b-button>
        <b-button v-on:click="vehicleUpdate">Press to update Vehicle with id 1</b-button>
        <b-button v-on:click="vehicleDelete">DELETE Vehicle with id:</b-button>
        <b-form-input v-model="id_to_del" placeholder="id to del"></b-form-input>
        <b-button v-on:click="showAllVehicles">Show all vehicles</b-button>
        {{allVehicles}}

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
                //todo: v-model for vars
                lic_plate: '',
                brand: 'TOYOTA',
                model: 'RAV4',
                km_tracker: '234675',
                id_to_del: '',
            }
        },
        methods: {
            newVehicle() {
                axios.post('/vehicle', {
                    lic_plate: this.lic_plate,
                    brand: this.brand,
                    model: this.model,
                    km_tracker: this.km_tracker,
                });
            },
            vehicleUpdate() {
                axios.post('/vehicleupdate', {
                    id: 1,
                    lic_plate: 'UPD2748',
                    brand: 'TOYOTA',
                    model: 'RAV4',
                    km_tracker: '234675',
                });
            },
            showAllVehicles() {
                axios.get('/vehicles')
                .then(r => {this.allVehicles = r.data})
            },
            vehicleDelete() {
                axios.post('/vehicledelete', {
                    id: this.id_to_del,
                });
            },
        },
        /* async mounted() {
            axios.post('/vehicle', {
                lic_plate: 'KPK2748',
                brand: 'TOYOTA',
                model: 'RAV4',
                km_tracker: '234675',
            });
        } */
    };
</script>
