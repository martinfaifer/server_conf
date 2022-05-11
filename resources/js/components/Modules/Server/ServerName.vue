<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="11" md="11" lg="11">
                <h2 class="pt-1">
                    <v-btn @click="openEditDialog()" icon>
                        <v-icon color="info" class="px-3"> mdi-pencil </v-icon>
                    </v-btn>
                    {{ server.server_name }}
                </h2>
            </v-col>
        </v-row>
        <v-divider class="py-3"> </v-divider>

        <v-dialog v-model="editDialog" persistent max-width="800">
            <v-form @submit.prevent="updateServerData()">
                <v-card>
                    <p class="grey lighten-5 text-center text-h6 py-3">
                        Úprava informací o serveru
                    </p>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.server_name"
                                    v-model="server.server_name"
                                    label="Popis serveru"
                                    name="Popis serveru"
                                    type="text"
                                    outlined
                                    dense
                                    class="body-2"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.ip_address"
                                    v-model="server.ip_address"
                                    label="IP serveru"
                                    name="IP serveru"
                                    prepend-inner-icon="mdi-ip"
                                    type="text"
                                    outlined
                                    dense
                                    class="body-2"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.username"
                                    v-model="server.login.username"
                                    label="Uživatelské jméno"
                                    name="Uživatelské jméno"
                                    prepend-inner-icon="mdi-account"
                                    type="text"
                                    outlined
                                    dense
                                    class="body-2"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="6" lg="6">
                                <v-text-field
                                    :error-messages="errors.password"
                                    v-model="server.login.password"
                                    label="Heslo"
                                    name="Heslo"
                                    prepend-inner-icon="mdi-lock"
                                    type="text"
                                    outlined
                                    dense
                                    class="body-2"
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
    </v-container>
</template>
<script>
export default {
    props: ["server"],
    computed: {},
    data() {
        return {
            editDialog: false,
            formData: [],
            errors: [],
        };
    },

    components: {},

    created() {},
    methods: {
        updateServerData() {
            this.closeDialog();
        },
        openEditDialog() {
            this.editDialog = true;
        },
        closeDialog() {
            this.editDialog = false;
            this.formData = [];
            this.errors = [];
        },
    },

    watch: {
        $route(to, from) {},
    },
};
</script>
