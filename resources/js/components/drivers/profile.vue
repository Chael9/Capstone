<template>
<div>
    <!-- BACKGROUND COLOR -->
<div class="blue-grey lighten-5">
    <!-- BACK ARROW ICON -->
   <v-toolbar flat dense floating class="transparent ma-0">
   <v-list class="transparent">
    <v-list-tile v-for="link in links" :key="link.text" href="/driver/home">
         <v-list-tile-action>
            <v-icon class="grey--text text--darken-4">{{ link.icon }}</v-icon>
         </v-list-tile-action>
    </v-list-tile>
   </v-list>
   </v-toolbar>
   <!-- PROFILE ICON -->
        <div class="text-xs-center">
            <v-avatar size="100" color="blue-grey darken-4">
                <v-icon size="60" dark>account_circle</v-icon>
            </v-avatar>
    <!-- PROFILE NAME -->
            <p class="title font-weight-light py-3" >{{ driver.fname }} {{ driver.lname }}</p>
        </div>
</div>
    <!-- PROFILE INFO -->
        <div class="text-xs-center subheader font-weight-light py-3">
            <p class="title font-weight-thin mb-4">License No.: {{ driver.lic_num }}</p>
            <p class="title font-weight-thin">Email Address: {{ driver.email }}</p>
        </div>
</div>
</template>

<script>

export default {
    props: {
        driver: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            drawer: false,
            links: [{ icon: 'arrow_back_ios'}]
        }
    }
}
</script>
