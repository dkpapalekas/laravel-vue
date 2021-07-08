<template>
    <div>
            <b-row class='my-3'>
                <b-col cols="6">
                    <label class='w-100 my-1' for="input-default">Brand</label>
                    <label class='w-100 my-1' for="input-default">Licence Plate</label>
                    <label class='w-100 my-1' for="input-default">Model</label>
                </b-col>
                <b-col cols="6">
                    <b-form-input v-model="brand" id="brand_input" placeholder="Brand"></b-form-input>
                    <b-form-input v-model="lic_plate" id="lic_plate_input" placeholder="Licence Plate"></b-form-input>
                    <b-form-input v-model="model" id="model_input" placeholder="Model"></b-form-input>
                </b-col>
            </b-row>
            <b-row>
                <b-button v-on:click="newVehicle">Press to add Vehicle</b-button>
            </b-row>

            <b-row class='my-3'>
                <b-col cols="6">
                    <label class='w-100 my-1' for="input-default">Id to update</label>
                </b-col>
                <b-col cols="6">
                    <b-form-input v-model="id_upd" placeholder="id upd"></b-form-input>
                </b-col>
            </b-row>
            <b-row>
                <b-button v-on:click="vehicleUpdate">Press to update Vehicle </b-button>
            </b-row>

            <b-row class='my-3'>
                <b-col cols="6">
                    <label class='w-100 my-1' for="input-default">Id to DELETE</label>
                </b-col>
                <b-col cols="6">
                    <b-form-input v-model="id_del" placeholder="id del"></b-form-input>
                </b-col>
            </b-row>
            <b-row>
                <b-button v-on:click="vehicleDelete">DELETE vehicle</b-button>
            </b-row>

            <b-row class='my-3'>
                <b-button v-on:click="showAllVehicles">Show all vehicles</b-button>
            </b-row>
            <b-row>
                <b-table class='mx-3' striped hover :items="allVehicles" :fields='fields'></b-table>
            </b-row>

            <b-row class='my-3'>
                <b-button variant="danger" v-on:click="vehicleAllDelete">DELETE ALL</b-button>
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
                fields: ['id', 'lic_plate', 'brand', 'model', 'km_tracker'],
                //todo: v-model for vars
                lic_plate: '',
                brand: '',
                model: '',
                km_tracker: '234675',
                id_upd: '',
                id_del: '',
            }
        },
        methods: {
            newVehicle() {
                axios.post('/vehicle', {
                    lic_plate: this.lic_plate,
                    brand: this.brand,
                    model: this.model,
                    km_tracker: this.km_tracker,
                })
                .then(this.showAllVehicles());
            },

            vehicleUpdate() {
                axios.post('/vehicleupdate', {
                    id: this.id_upd,
                    lic_plate: this.lic_plate || null,
                    brand: this.brand || null,
                    model: this.model || null,
                    km_tracker: this.km_tracker || null,
                })
                .then(this.showAllVehicles());
            },

            showAllVehicles() {
                axios.get('/vehicles')
                .then(r => {this.allVehicles = r.data})
            },

            vehicleDelete() {
                axios.post('/vehicledelete', {
                    id: this.id_del,
                });
            },

            vehicleAllDelete() {
                axios.post('/vehicleAlldelete')
                .then(this.showAllVehicles());
            },
        },
        async mounted() {
            this.showAllVehicles()
        }
    };
</script>
