<template>
    <div>
        <v-container fluid>
            <v-row>
                <v-col cols="12" sm="12" md="4" lg="4" v-if="server.login">
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
                                    Přístup
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                    >
                                        <strong>IP: </strong>
                                        {{ server.ip_address }}
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                        v-if="server.login"
                                    >
                                        <strong>Přístup: </strong>
                                        {{ server.login.username }} /
                                        {{ server.login.password }}
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                        v-if="server.superuser"
                                    >
                                        <strong>Root heslo: </strong>
                                        {{ server.superuser.root_password }}
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="12" sm="12" md="4" lg="4" v-if="server.domains">
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
                                    Domény
                                </p>
                                <v-spacer></v-spacer>
                                <v-btn
                                    icon
                                    x-small
                                    @click="openCreateDomainDialog()"
                                >
                                    <v-icon color="green" x-small
                                        >mdi-plus</v-icon
                                    >
                                </v-btn>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                        v-for="domain in server.domains"
                                        :key="domain.id"
                                    >
                                        <a
                                            :href="domain.domain"
                                            target="_blank"
                                            class="caption font-weight-bold grey--text"
                                        >
                                            {{ domain.domain }}
                                        </a>
                                        <div>
                                            <v-btn
                                                icon
                                                x-small
                                                @click="
                                                    openEditDomainDialog(domain)
                                                "
                                            >
                                                <v-icon color="info" x-small
                                                    >mdi-pencil</v-icon
                                                >
                                            </v-btn>
                                            <v-btn
                                                icon
                                                x-small
                                                @click="
                                                    openRemoveDomainDialog(
                                                        domain
                                                    )
                                                "
                                            >
                                                <v-icon color="red" x-small>
                                                    mdi-delete
                                                </v-icon>
                                            </v-btn>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="12" sm="12" md="4" lg="4" v-if="server.logfiles">
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
                                    Logy
                                </p>
                                <v-spacer></v-spacer>
                                <v-btn
                                    icon
                                    x-small
                                    @click="openCreateLogFilePathDialog()"
                                >
                                    <v-icon color="green" x-small
                                        >mdi-plus</v-icon
                                    >
                                </v-btn>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                        v-for="logfile in server.logfiles"
                                        :key="logfile.id"
                                    >
                                        <p
                                            class="caption font-weight-bold grey--text"
                                        >
                                            {{ logfile.description }}
                                        </p>
                                        <v-btn
                                            icon
                                            x-small
                                            @click="
                                                getLogFileContent(logfile.id)
                                            "
                                            :loading="loading"
                                        >
                                            <v-icon color="info" x-small
                                                >mdi-magnify</v-icon
                                            >
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col
                    cols="12"
                    sm="12"
                    md="4"
                    lg="4"
                    v-if="serverConfiguration != undefined"
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
                                    Operační systém
                                </p>
                                <v-spacer></v-spacer>
                            </v-row>
                        </v-card-subtitle>
                        <v-card-text class="text--center caption">
                            <v-container fluid>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                    >
                                        <v-virtual-scroll
                                            :bench="0"
                                            :items="
                                                serverConfiguration.system
                                                    .kernel
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

        <v-dialog v-model="domainDialog" persistent max-width="600">
            <v-form @submit.prevent="storeDomain()">
                <v-card>
                    <p class="grey lighten-5 text-center text-h6 py-3">
                        Přidání domény na serveru
                    </p>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12" sm="12" md="12" lg="12">
                                <v-text-field
                                    :error-messages="errors.domain"
                                    v-model="formData.domain"
                                    label="Doména"
                                    name="Doména"
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

        <v-dialog v-model="editDomainDialog" persistent max-width="600">
            <v-form @submit.prevent="updateDomain()">
                <v-card>
                    <p class="grey lighten-5 text-center text-h6 py-3">
                        Úprava domény na serveru
                    </p>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12" sm="12" md="12" lg="12">
                                <v-text-field
                                    :error-messages="errors.domain"
                                    v-model="formData.domain"
                                    label="Doména"
                                    name="Doména"
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

        <v-dialog v-model="logFilePathDialog" persistent max-width="600">
            <v-form @submit.prevent="storeLogfilePath()">
                <v-card>
                    <p class="grey lighten-5 text-center text-h6 py-3">
                        Přidání cesty k logům
                    </p>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.path"
                                    v-model="formData.path"
                                    label="Cesta k logům"
                                    name="Cesta k logům"
                                    type="text"
                                    outlined
                                    dense
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.description"
                                    v-model="formData.description"
                                    label="Popis"
                                    name="Popis"
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

        <v-dialog
            v-model="readFileDialog"
            persistent
            max-width="800"
            scrollable
        >
            <v-card>
                <p class="grey lighten-5 text-center text-h6 py-3">
                    Obsah souboru
                </p>
                <v-card-text>
                    <v-row class="grey lighten-5">
                        <v-col cols="12" sm="12" md="12" lg="12">
                            <p v-for="line in formData" :key="line">
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
                    <v-btn
                        :loading="loading"
                        color="orange darken-1"
                        text
                        plain
                        @click="clearFileContent()"
                    >
                        Smazat obsah souboru
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-dialog v-model="removeDomainDialog" persistent max-width="400px">
            <v-card>
                <v-card-text>
                    <v-container class="pt-3">
                        <v-row>
                            <v-col cols="12" sm="12" md="12" lg="12">
                                <p class="mt-6 text-center headline">
                                    Přejete si odebrat doménu?
                                </p>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions class="grey lighten-5">
                    <v-spacer></v-spacer>
                    <v-btn
                        color="blue darken-1"
                        @click="closeDialog()"
                        plain
                        outlined
                    >
                        Zavřít
                    </v-btn>
                    <v-btn
                        color="red darken-1"
                        @click="removeDomain()"
                        plain
                        outlined
                    >
                        Odebrat
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
export default {
    props: ["server", "serverConfiguration"],
    computed: {},
    data() {
        return {
            loading: false,
            domainDialog: false,
            logFilePathDialog: false,
            readFileDialog: false,
            loginDialog: false,
            editDomainDialog: false,
            removeDomainDialog: false,
            formData: [],
            fileId: null,
            errors: [],
        };
    },

    components: {},

    created() {},
    methods: {
        closeDialog() {
            this.errors = [];
            this.formData = [];
            this.loginDialog = false;
            this.logFilePathDialog = false;
            this.domainDialog = false;
            this.readFileDialog = false;
            this.editDomainDialog = false;
            this.removeDomainDialog = false;
            this.loading = false;
            this.fileId = null;
        },
        getLogFileContent(fileId) {
            this.fileId = fileId;
            this.loading = true;
            axios
                .get(
                    "servers/" +
                        this.$route.params.serverId +
                        "/logfiles/read/" +
                        fileId
                )
                .then((response) => {
                    this.formData = response.data;
                    this.readFileDialog = true;
                    this.loading = false;
                });
        },

        clearFileContent() {
            this.loading = true;
            axios
                .post(
                    "servers/" +
                        this.$route.params.serverId +
                        "/logfiles/clear/" +
                        this.fileId
                )
                .then((response) => {
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                });
        },
        openCreateDomainDialog() {
            this.domainDialog = true;
        },
        openCreateLogFilePathDialog() {
            this.logFilePathDialog = true;
        },
        openEditDomainDialog(domain) {
            this.formData = domain;
            this.editDomainDialog = true;
        },

        openRemoveDomainDialog(domain) {
            this.formData = domain;
            this.removeDomainDialog = true;
        },

        storeLogfilePath() {
            axios
                .post("servers/" + this.$route.params.serverId + "/logfiles", {
                    path: this.formData.path,
                    description: this.formData.description,
                })
                .then((response) => {
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                    this.$root.$emit("reaload_server_information", "update");
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        storeDomain() {
            axios
                .post("servers/" + this.$route.params.serverId + "/domains", {
                    domain: this.formData.domain,
                })
                .then((response) => {
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                    this.$root.$emit("reaload_server_information", "update");
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        updateDomain() {
            axios
                .patch(
                    "servers/" +
                        this.$route.params.serverId +
                        "/domains/" +
                        this.formData.id,
                    {
                        domain: this.formData.domain,
                    }
                )
                .then((response) => {
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                    this.$root.$emit("reaload_server_information", "update");
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        removeDomain() {
            axios
                .delete(
                    "servers/" +
                        this.$route.params.serverId +
                        "/domains/" +
                        this.formData.id
                )
                .then((response) => {
                    this.$store.state.alerts = response.data;
                    this.closeDialog();
                    this.$root.$emit("reaload_server_information", "update");
                });
        },
    },

    watch: {
        $route(to, from) {},
    },
};
</script>
