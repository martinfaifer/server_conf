<template>
    <div>
        <v-card
            flat
            background-color="transparent"
            color="transparent"
        >
            <v-row>
                <v-col cols="12" sm="12" md="12" lg="12">
                    <v-tabs
                        centered
                        dense
                        v-model="serverTab"
                        color="cyan"
                        class="caption"
                        background-color="transparent"
                    >
                        <v-tabs-slider></v-tabs-slider>
                        <v-tab
                            dense
                            link
                            v-bind:to="
                                '/server/' +
                                this.$route.params.serverId +
                                '/info'
                            "
                            href="info"
                        >
                            Obecné</v-tab
                        >
                        <v-tab
                            link
                            v-bind:to="
                                '/server/' +
                                this.$route.params.serverId +
                                '/hardware'
                            "
                            href="hardware"
                            >Hardware</v-tab
                        >
                        <v-tab
                            link
                            v-bind:to="
                                '/server/' +
                                this.$route.params.serverId +
                                '/software'
                            "
                            href="software"
                            >Software</v-tab
                        >
                    </v-tabs>
                </v-col>
            </v-row>
        </v-card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            serverTab: null,
        };
    },
    watch: {
        $route(to, from) {
            this.serverTab = "/server/" + this.$route.params.serverId;
        },
    },
};
</script>
