<template>
    <div>
        <v-navigation-drawer color="black" v-model="drawer" fixed app>
            <v-list-item class="px-2">
                <v-list-item-avatar>
                    <span v-if="user.avatar != null">
                        <v-img :src="user.avatar.avatar"></v-img>
                    </span>
                    <span>
                        <v-icon color="#616161"> mdi-account </v-icon>
                    </span>
                </v-list-item-avatar>

                <v-list-item-title
                    style="color: #f8f9fa"
                    class="font-weight-bold"
                    >{{ user.name }}</v-list-item-title
                >
            </v-list-item>
            <v-divider class="mx-3" color="#616161"></v-divider>
            <v-list nav dense class="py-6">
                <v-list-item
                    two-line
                    link
                    v-for="server in servers"
                    :key="server.id"
                    :to="'/server/' + server.id + '/info'"
                >
                    <v-list-item-icon>
                        <v-icon small color="#f8f9fa"> mdi-server</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content class="mt-n2">
                        <v-list-item-title
                            style="color: #f8f9fa"
                            class="font-weight-medium"
                        >
                            {{ server.server_name }}</v-list-item-title
                        >
                        <v-list-item-subtitle class="cyan--text caption">{{
                            server.ip_address
                        }}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>
<script>
export default {
    computed: {
        user() {
            return this.$store.state.user;
        },
    },
    data() {
        return {
            drawer: true,
            servers: [],
        };
    },
    components: {},
    created() {
        this.index();
    },
    methods: {
        index() {
            axios
                .get("servers")
                .then((response) => {
                    this.servers = response.data;
                })
                .catch((error) => {
                    if (error.response.status == "401") {
                        this.$router.push("/login");
                    }
                });
        },
    },
    mounted() {
        this.$root.$on("update_servers_menu", (update) => {
            this.index();
        });
    },
};
</script>
