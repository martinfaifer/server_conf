<template>
    <div>
        <v-container fluid>
            <v-row>
                <v-col
                    v-if="serverConfiguration != undefined"
                    cols="12"
                    sm="12"
                    md="4"
                    lg="4"
                >
                    <v-card
                        class="overflow-hidden rounded-lg blur shadow-blur"
                        flat
                    >
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row
                                    class="ml-3"
                                    v-if="serverConfiguration.hardware"
                                >
                                    <span class="headline">
                                        <v-icon>
                                            mdi-memory
                                        </v-icon>
                                       RAM {{
                                            ramInHumanFormat(
                                                serverConfiguration.hardware
                                                    .ram[0]
                                            )
                                        }}
                                        GB
                                    </span>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col
                    v-if="serverConfiguration != undefined"
                    cols="12"
                    sm="12"
                    md="4"
                    lg="4"
                >
                    <v-card
                        class="overflow-hidden rounded-lg blur shadow-blur"
                        flat
                    >
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row
                                    class="ml-3"
                                    v-if="serverConfiguration.hardware"
                                >
                                    <span class="headline">
                                        <v-icon>
                                            mdi-cpu-64-bit
                                        </v-icon>
                                        Počet CPU jader {{
                                            serverConfiguration.hardware
                                                .sumCpuCores[0]
                                        }}
                                    </span>
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
    props: ["serverConfiguration"],
    computed: {},
    data() {
        return {};
    },

    components: {},

    created() {},
    methods: {
        ramInHumanFormat(ramString) {
            let ram;
            ram = ramString.replace("MemTotal:", "");
            ram = ram.replace("kB", "");
            return parseInt((ram = ram / 1000000));
        },
    },

    watch: {
        $route(to, from) {},
    },
};
</script>
