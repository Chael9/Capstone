<template>
  <v-layout wrap>
    <!-- Toolbar -->
    <v-toolbar flat dense floating class="transparent ma-0" app>
    <v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
  </v-toolbar>
    <!-- Navbar -->
    <v-navigation-drawer v-model="drawer" app class="grey lighten-4">
    <!-- Profile -->
      <v-toolbar flat class="blue-grey lighten-5 pa-3 ma-0">
        <v-list class="pa-0 ma-0">
          <v-list-tile avatar href="/admin/profile">
    <!-- Profile Image -->
            <v-avatar color="blue-grey darken-4">
              <v-icon dark>account_circle</v-icon>
            </v-avatar>
    <!-- Profile Name -->
            <v-list-tile-content class="pl-3">
              <v-list-tile-title class="title font-weight-light">{{ admin.fname }}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>
    <!-- Student Table Icon -->
      <v-list class="pa-0" dense>
        <v-list-tile class="pt-1" href="/admin/stutable">
          <v-list-tile-action>
            <v-icon>person</v-icon>
          </v-list-tile-action>
    <!-- Student Table Title -->
          <v-list-tile-content>
            <v-list-tile-title class="title font-weight-thin">Student Table</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    <!-- Logout -->
      <v-toolbar flat>
        <v-list >
          <v-list-tile @click.prevent="logout" avatar>
            <v-list-tile-action>
              <v-icon>exit_to_app</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title class="title font-weight-thin">Logout</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>
    </v-navigation-drawer>

  </v-layout>
</template>

<script>
export default {
    props: {
        admin: {
            type: Object,
            required: true
        }
    },
  data() {
    return {
      drawer: false
    };
  },
  methods: {
    logout() {
      axios
        .get('logout')
        .then(function(response) {})
        .catch(function(response) {});
        window.location.replace("/admin/login");
    }
  }
};
</script>
