<template>
    <v-app>
        <div>
            <Sidemenu></Sidemenu>
            <v-main app>
                <v-container fluid class="mr-16">
                    <MainToolBar></MainToolBar>
                    <router-view class="mt-3"> </router-view>
                </v-container>
            </v-main>
        </div>
        <SnackBar></SnackBar>
    </v-app>
</template>

<script>
import Sidemenu from "./Sidemenu.vue";
import MainToolBar from "./MainToolBar.vue";
import SnackBar from "./Alert/snackbar.vue";
export default {
    computed: {},
    data() {
        return {
            alert: true,
        };
    },

    components: {
        Sidemenu,
        MainToolBar,
        SnackBar,
    },

    created() {
        this.index();
    },
    methods: {
        index() {
            axios
                .get("users")
                .then((response) => {
                    this.$store.state.user = response.data;
                })
                .catch((error) => {
                    if (error.response.status == "401") {
                        this.$router.push("/login");
                    }
                });
        },
    },

    // mounted() {
    //     this.$root.$on("update_user_data", (update) => {
    //         this.index();
    //     });
    // },

    watch: {
        $route(to, from) {},
    },
};
</script>
