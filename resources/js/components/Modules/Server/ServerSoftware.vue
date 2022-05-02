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
                        <v-card-subtitle>
                            <v-row class="justify-center">
                                <v-spacer></v-spacer>
                                <p
                                    class="mt-3 text-center caption font-weight-bold"
                                >
                                    Prostředí
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row
                                    class="ml-3"
                                    v-if="serverConfiguration.eviroments"
                                >
                                    <v-col cols="12">
                                        <strong>PHP: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.eviroments
                                                    .php.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.eviroments
                                                    .php[0]
                                            }}
                                        </span>
                                        <span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
                                        </span>
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>NodeJS: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.eviroments
                                                    .nodejs.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.eviroments
                                                    .nodejs[0]
                                            }}
                                        </span>
                                        <span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
                                        </span>
                                    </v-col>

                                    <v-col cols="12">
                                        <strong>Python3: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.eviroments
                                                    .python3.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.eviroments
                                                    .python3[0]
                                            }}
                                        </span>
                                        <span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
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
                        <v-card-subtitle>
                            <v-row class="justify-center">
                                <v-spacer></v-spacer>
                                <p
                                    class="mt-3 text-center caption font-weight-bold"
                                >
                                    Nastavení webu
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row
                                    class="ml-3"
                                    v-if="serverConfiguration.web_server"
                                >
                                    <v-col cols="12">
                                        <strong>Webový server: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.web_server
                                                    .webserver.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.web_server
                                                    .webserver[0]
                                            }}
                                        </span>
                                        <span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
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
                        <v-card-subtitle>
                            <v-row class="justify-center">
                                <v-spacer></v-spacer>
                                <p
                                    class="mt-3 text-center caption font-weight-bold"
                                >
                                    Databáze
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row
                                    class="ml-3"
                                    v-if="serverConfiguration.database"
                                >
                                    <v-col cols="12">
                                        <strong>MySQL: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.database
                                                    .mysql.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.database
                                                    .mysql[0]
                                            }}
                                        </span>
                                        <span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
                                        </span>
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Redis: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.database
                                                    .redis.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.database
                                                    .redis[0]
                                            }}
                                        </span>
                                        <span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
                                        </span>
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>MongoDB: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.database
                                                    .mongoDb.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.database
                                                    .mongoDb[0]
                                            }} </span
                                        ><span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
                                        </span>
                                    </v-col>
                                     <v-col cols="12">
                                        <strong>Memcached: </strong>
                                        <span
                                            v-if="
                                                serverConfiguration.database
                                                    .memcached.length != 0
                                            "
                                        >
                                            {{
                                                serverConfiguration.database
                                                    .memcached[0]
                                            }} </span
                                        ><span v-else>
                                            <v-icon small color="red">
                                                mdi-close
                                            </v-icon>
                                        </span>
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
