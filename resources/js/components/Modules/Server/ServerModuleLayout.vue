<template>
    <div>
        <ServerName :server="server"></ServerName>
        <ServerSumInformations class="mt-n11" :serverConfiguration="serverConfiguration.server_data"></ServerSumInformations>
        <ServerMenu></ServerMenu>
        <ServerObecne
            v-if="$route.params.component === 'info'"
            :server="server"
            :serverConfiguration="serverConfiguration.server_data"
        ></ServerObecne>
        <ServerHardware
            v-if="$route.params.component === 'hardware'"
            :server="server"
            :serverConfiguration="serverConfiguration.server_data"
        ></ServerHardware>
        <ServerSoftware
            v-if="$route.params.component === 'software'"
            :server="server"
            :serverConfiguration="serverConfiguration.server_data"
        ></ServerSoftware>
    </div>
</template>
<script>
import ServerName from "./ServerName.vue";
import ServerSumInformations from "./ServerSumInformations";
import ServerMenu from "./ServerMenu.vue";
import ServerObecne from "./ServerObecne.vue";
import ServerHardware from "./ServerHardware.vue";
import ServerSoftware from "./ServerSoftware.vue";
export default {
    computed: {},
    data() {
        return {
            server: [],
            serverConfiguration: [],
        };
    },

    components: {
        ServerName,
        ServerSumInformations,
        ServerMenu,
        ServerObecne,
        ServerHardware,
        ServerSoftware,
    },

    created() {
        this.index();
    },
    methods: {
        index() {
            axios
                .get("/servers/" + this.$route.params.serverId)
                .then((response) => {
                    this.server = response.data;
                });

            axios
                .get(
                    "/servers/" + this.$route.params.serverId + "/config-datas"
                )
                .then((response) => {
                    this.serverConfiguration = response.data;
                });
        },
    },

    watch: {
        $route(to, from) {
            this.index();
        },
    },
};
</script>
