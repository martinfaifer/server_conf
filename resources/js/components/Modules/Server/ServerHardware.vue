<template>
    <div>
        <v-container fluid>
            <v-row v-if="serverConfiguration != undefined">
                <v-col cols="12" sm="12" md="6" lg="6">
                    <v-card
                        class="overflow-hidden rounded-lg blur shadow-blur"
                        flat
                    >
                        <v-card-subtitle>
                            <v-row class="justify-center">
                                <v-spacer></v-spacer>
                                <p
                                    class="mt-3 text-center caption font-weight-bold"
                                >
                                    CPU
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row class="ml-3">
                                    <v-col cols="12">
                                        <v-virtual-scroll
                                            :bench="0"
                                            :items="
                                                serverConfiguration.hardware
                                                    .cpuInformation
                                            "
                                            height="300"
                                            item-height="36"
                                        >
                                            <template v-slot:default="{ item }">
                                                <v-list-item :key="item">
                                                    <v-list-item-content>
                                                        <v-list-item-title
                                                            class="text--center caption"
                                                            >{{
                                                                item
                                                            }}</v-list-item-title
                                                        >
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </template>
                                        </v-virtual-scroll>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="12" sm="12" md="6" lg="6">
                    <v-card
                        class="overflow-hidden rounded-lg blur shadow-blur"
                        flat
                    >
                        <v-card-subtitle>
                            <v-row class="justify-center">
                                <v-spacer></v-spacer>
                                <p
                                    class="mt-3 text-center caption font-weight-bold"
                                >
                                    Hardware
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row class="ml-3">
                                    <v-col cols="12">
                                        <v-virtual-scroll
                                            :bench="0"
                                            :items="
                                                serverConfiguration.hardware
                                                    .hardwareInformation
                                            "
                                            height="300"
                                            item-height="36"
                                        >
                                            <template v-slot:default="{ item }">
                                                <v-list-item :key="item">
                                                    <v-list-item-content>
                                                        <v-list-item-title
                                                            class="text--center caption"
                                                            >{{
                                                                item
                                                            }}</v-list-item-title
                                                        >
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </template>
                                        </v-virtual-scroll>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
export default {
    props: ["server", "serverConfiguration"],
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
