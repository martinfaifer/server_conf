<template>
    <v-col cols="12" sm="12" md="12" lg="12" class="justify-center">
        <v-toolbar
            class="rounded-lg blur shadow-blur overflow-hidden"
            flat
            dense
            fixed
        >
            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-apps</v-icon>
            </v-btn>

            <v-menu offset-y>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn icon v-bind="attrs" v-on="on">
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </template>
                <v-list dense class="caption">
                    <v-list-item @click="openNewServerDialog()">
                        <v-list-item-icon>
                            <v-icon small color="green">mdi-plus</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Přidat server</v-list-item-title>
                    </v-list-item>
                    <v-divider class="mx-3"></v-divider>
                    <v-list-item
                        v-if="$route.params.serverId"
                        @click="getCronTabInformation()"
                    >
                        <v-list-item-icon>
                            <v-icon small color="indigo">mdi-magnify</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Zobrazit CronTab</v-list-item-title>
                    </v-list-item>
                    <v-divider class="mx-3"></v-divider>
                    <v-list-item
                        v-if="$route.params.serverId"
                        @click="getCronTabInformation()"
                    >
                        <v-list-item-icon>
                            <v-icon small color="red">mdi-restart</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Restartovat</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-toolbar>
        <v-dialog v-model="newServerDialog" persistent max-width="600">
            <v-form @submit.prevent="storeServer()">
                <v-card>
                    <p class="grey lighten-5 text-center text-h6 py-3">
                        Přidání serveru do systému
                    </p>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.ip_address"
                                    v-model="formData.ip_address"
                                    label="IP serveru"
                                    name="IP serveru"
                                    prepend-inner-icon="mdi-ip"
                                    type="text"
                                    outlined
                                    dense
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.server_name"
                                    v-model="formData.server_name"
                                    label="Popis serveru"
                                    name="Popis serveru"
                                    type="text"
                                    outlined
                                    dense
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.username"
                                    v-model="formData.username"
                                    label="Uživatelské jméno"
                                    name="Uživatelské jméno"
                                    prepend-inner-icon="mdi-account"
                                    type="text"
                                    outlined
                                    dense
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.password"
                                    v-model="formData.password"
                                    label="Heslo"
                                    name="Heslo"
                                    prepend-inner-icon="mdi-lock"
                                    type="text"
                                    outlined
                                    dense
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions class="grey lighten-5">
                        <v-btn
                            color="red darken-1"
                            text
                            plain
                            @click="closeDialog()"
                        >
                            Zavřít
                        </v-btn>
                        <v-spacer></v-spacer>
                        <v-btn type="submit" color="green darken-1" text plain>
                            Uložit
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>

        <v-dialog v-model="crontabDialog" persistent max-width="800" scrollable>
            <v-card>
                <p class="grey lighten-5 text-center text-h6 py-3">
                    Nastavení CronTabu
                </p>
                <v-btn
                    icon
                    x-small
                    right
                    absolute
                    class="mt-4"
                    @click="openEditCrontabDialog()"
                >
                    <v-icon x-small color="red"> mdi-pencil </v-icon>
                </v-btn>
                <v-card-text>
                    <v-row class="grey lighten-5">
                        <v-col
                            cols="12"
                            sm="12"
                            md="12"
                            lg="12"
                            v-if="formData.crontab"
                        >
                            <p v-for="line in formData.crontab" :key="line">
                                {{ line }}
                            </p>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="grey lighten-5">
                    <v-btn
                        color="red darken-1"
                        text
                        plain
                        @click="closeDialog()"
                    >
                        Zavřít
                    </v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-dialog
            v-model="editCrontabDialog"
            persistent
            max-width="800"
            scrollable
        >
            <v-form @submit.prevent="updateCrontab()">
                <v-card>
                    <p class="grey lighten-5 text-center text-h6 py-3">
                        Úprava CronTabu
                    </p>
                    <v-card-text>
                        <v-row class="grey lighten-5">
                            <v-col
                                cols="12"
                                sm="12"
                                md="12"
                                lg="12"
                                v-if="formData.crontabEdit"
                            >
                                <v-textarea
                                    v-model="formData.crontabEdit"
                                    :error="errors.fileContent"
                                ></v-textarea>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions class="grey lighten-5">
                        <v-btn
                            color="red darken-1"
                            text
                            plain
                            @click="closeDialog()"
                        >
                            Zavřít
                        </v-btn>
                        <v-spacer></v-spacer>
                        <v-btn type="submit" color="green darken-1" text plain :loading="submitLoading">
                            Přepsat soubor
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </v-col>
</template>
<script>
export default {
    computed: {},
    data() {
        return {
            errors: [],
            formData: [],
            newServerDialog: false,
            crontabDialog: false,
            editCrontabDialog: false,
            submitLoading: false,
        };
    },
    components: {},
    created() {},
    methods: {
        closeDialog() {
            this.newServerDialog = false;
            this.crontabDialog = false;
            this.editCrontabDialog = false;
            this.formData = [];
            this.errors = [];
            this.submitLoading = false;
        },
        openNewServerDialog() {
            this.newServerDialog = true;
        },
        storeServer() {
            axios
                .post("servers", {
                    ip_address: this.formData.ip_address,
                    server_name: this.formData.server_name,
                    username: this.formData.username,
                    password: this.formData.password,
                })
                .then((response) => {
                    if (response.data.status == "success") {
                        this.$root.$emit("update_servers_menu", "update");
                    }
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        getCronTabInformation() {
            axios
                .get("servers/" + this.$route.params.serverId + "/crontab")
                .then((response) => {
                    this.formData.crontab = response.data;
                    this.crontabDialog = true;
                });
        },

        openEditCrontabDialog() {
            this.formData.crontabEdit = this.joinByNewLine(this.formData.crontab);
            this.editCrontabDialog = true;
        },

        updateCrontab() {
            this.submitLoading = true;
            axios
                .post("servers/" + this.$route.params.serverId + "/crontab", {
                    fileContent: this.formData.crontabEdit,
                })
                .then((response) => {
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        joinByNewLine(array) {
            return array.join("\n");
        },
    },
};
</script>
