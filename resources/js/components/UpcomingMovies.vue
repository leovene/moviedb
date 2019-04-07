<template>
    <v-layout row wrap>
        <v-flex v-for="i in movies" :key="i.id" xs6>
            <v-card>
                <v-img :src="`https://image.tmdb.org/t/p/w500/${i.backdrop_path}`"  aspect-ratio="2.75"></v-img>

                <v-card-title primary-title>
                    <div>
                        <div class="headline">{{i.title}}</div>
                        <span class="grey--text">Genre: {{i.genre_ids}}</span> <---->
                        <span class="black--text">Release date: {{i.release_date}}</span>
                    </div>
                </v-card-title>

                <v-card-actions>
                    <v-btn flat color="orange" @click="$router.push({name: 'details', params: { movie: i}})">+ Details</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        name: "UpcomingMovies",
        props: ['page'],
        data() {
          return  {
              movies: []
          }
        },
        created() {
            axios
                .get(`http://localhost:8080/api/movies/upcoming/${this.page}`)
                .then(response => {
                    this.movies = response['data']['data'];
                });
        },
        watch: {
            page: function(val) {
                console.log(val);
                axios
                    .get(`http://localhost:8080/api/movies/upcoming/${val}`)
                    .then(response => {
                        this.movies = response['data']['data'];
                        console.log(this.movies);
                    });
            }
        }
    }
</script>

<style>

</style>
