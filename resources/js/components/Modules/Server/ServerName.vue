<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="11" md="11" lg="11">
                <h2 class="pt-1">
                    {{ server.server_name }}
                </h2>
            </v-col>
        </v-row>
        <v-divider class="py-3"> </v-divider>
    </v-container>
</template>
<script>
export default {
    props: ["server"],
    computed: {},
    data() {
        return {};
    },

    components: {},

    created() {},
    methods: {},

    watch: {
        $route(to, from) {},
    },
};
</script>
