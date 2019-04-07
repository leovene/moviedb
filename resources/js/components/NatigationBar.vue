<template>
    <div>
        <v-toolbar-items class="hidden-sm-and-down">
            <div class="ma-2"><router-link to="/toprated"><span class="black--text"><h3>Top rated</h3></span></router-link></div>
            <div class="ma-2"><router-link to="/findupcoming"><span class="black--text"><h3>Find Upcoming</h3></span></router-link></div>
            <div class="ma-2"><router-link to="/findmovies"><span class="black--text text-lg-right"><h3>Find Movies</h3></span></router-link></div>
        </v-toolbar-items>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>


<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>


<script>
</script>
