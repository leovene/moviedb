<template>
    <v-toolbar app color="blue">
        <v-toolbar-title class="headline text-uppercase">
            <router-link to="/"><span>Movies center</span></router-link>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <navigation-bar></navigation-bar>
    </v-toolbar>
</template>

<script>
    import NavigationBar from './NatigationBar';
    export default {
        name: 'MenuComponent',
        components: {
            'navigation-bar': NavigationBar
        }
    }
</script>

<style>

</style>
