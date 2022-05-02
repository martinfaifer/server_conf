<template>
    <v-snackbar
        v-model="snackbar"
        :timeout="timeout"
        :color="notificationColor(alert.status)"
        bottom
        right
    >
        <span class="text-right">
            {{ alert.message }}
        </span>
    </v-snackbar>
</template>
<script>
export default {
    computed: {
        alert() {
            return this.$store.state.alerts;
        },
    },
    data: () => ({
        snackbar: false,
        timeout: 5000,
    }),
    methods: {
        notificationColor(status) {
            if (status == "success") {
                return "green accent-4";
            }
            return "red accent-4";
        },
    },
    watch: {
        alert() {
            if (this.alert.length != 0) {
                this.snackbar = true;
                setTimeout(
                    function () {
                        this.$store.state.alerts = [];
                    }.bind(this),
                    5200
                );
            } else {
                return;
            }
        },
    },
};
</script>
