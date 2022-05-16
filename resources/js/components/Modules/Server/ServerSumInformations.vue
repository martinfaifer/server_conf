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
                                <v-row v-if="serverConfiguration.hardware">
                                    <v-col cols="12">
                                        <span class="display-1">
                                            <v-icon> mdi-memory </v-icon>
                                            RAM
                                            <span
                                                class="headline"
                                                v-html="
                                                    ramInHumanFormat(
                                                        serverConfiguration
                                                            .hardware.ram[0]
                                                    ) + 'GB / '
                                                "
                                            ></span>
                                            <span
                                                class="title green--text"
                                                v-html="
                                                    ramInHumanFormat(
                                                        serverConfiguration
                                                            .hardware.ram[5]
                                                    )
                                                     + 'GB zbývá'
                                                "
                                            ></span>
                                        </span>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-progress-linear
                                            color="cyan"
                                            rounded
                                            height="10"
                                            :value="
                                                countPercent(
                                                    serverConfiguration.hardware
                                                        .ram[0],
                                                    serverConfiguration.hardware
                                                        .ram[5]
                                                )
                                            "
                                        >
                                            <template v-slot:default="{}">
                                                <span
                                                    class="white--text font-weight-bold"
                                                    >{{
                                                        Math.ceil(
                                                            countPercent(
                                                                serverConfiguration
                                                                    .hardware
                                                                    .ram[0],
                                                                serverConfiguration
                                                                    .hardware
                                                                    .ram[5]
                                                            )
                                                        )
                                                    }}%</span
                                                >
                                            </template>
                                        </v-progress-linear>
                                    </v-col>
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
                        height="130"
                    >
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row v-if="serverConfiguration.hardware">
                                    <v-col cols="12">
                                        <span class="display-1">
                                            <v-icon> mdi-cpu-64-bit </v-icon>
                                            CPU jader
                                            <span
                                                class="headline"
                                                v-html="
                                                    serverConfiguration.hardware
                                                        .sumCpuCores[0]
                                                "
                                            >
                                            </span>
                                        </span>
                                    </v-col>
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
                                <v-row v-if="serverConfiguration.hardware.hdd">
                                    <v-col cols="12">
                                        <span class="display-1">
                                            <v-icon> mdi-harddisk </v-icon>
                                            HDD
                                            <span
                                                class="headline"
                                                v-html="
                                                    convertToGB(
                                                        serverConfiguration
                                                            .hardware.hdd
                                                            .total[0]
                                                    ) + 'GB / '
                                                "
                                            ></span
                                            ><span
                                                class="title green--text"
                                                v-html="
                                                    convertToGB(
                                                        serverConfiguration
                                                            .hardware.hdd
                                                            .free[0]
                                                    ) + 'GB zbývá'
                                                "
                                            ></span>
                                        </span>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-progress-linear
                                            color="cyan"
                                            rounded
                                            height="10"
                                            :value="
                                                countPercent(
                                                    serverConfiguration.hardware
                                                        .hdd.total[0],
                                                    serverConfiguration.hardware
                                                        .hdd.free[0]
                                                )
                                            "
                                        >
                                            <template v-slot:default="{}">
                                                <span
                                                    class="white--text font-weight-bold"
                                                    >{{
                                                        Math.ceil(
                                                            countPercent(
                                                                serverConfiguration
                                                                    .hardware
                                                                    .hdd
                                                                    .total[0],
                                                                serverConfiguration
                                                                    .hardware
                                                                    .hdd.free[0]
                                                            )
                                                        )
                                                    }}%</span
                                                >
                                            </template>
                                        </v-progress-linear>
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
    props: ["serverConfiguration"],
    computed: {},
    data() {
        return {};
    },

    components: {},

    created() {},
    methods: {
        ramInHumanFormat(ramString) {
            // let ram;
            // ram = ramString.replace("MemTotal:", "");
            // ram = ram.replace("kB", "");
            return parseInt((ramString / 1000000));
        },

        convertToGB(bytes) {
            return Math.round(bytes / 1000000000);
        },

        countPercent(total, free) {
            return parseInt((free * 100) / total);
        },
    },

    watch: {
        $route(to, from) {},
    },
};
</script>
