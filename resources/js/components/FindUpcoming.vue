<template>
    <v-app>
        <menu-component/>
        <v-content>
            <v-container grid-list-md text-xs-center>
                <v-responsive>
                    <v-container fill-height>
                        <v-layout align-center>
                            <v-flex>
                                <h3 class="display-3">Find upcoming movie</h3>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-responsive>
            </v-container>
            <v-layout row>
                <v-flex xs12 sm6 offset-sm3>
                    <v-text-field
                        label="Title"
                        outline
                        v-model="title"
                    ></v-text-field>
                </v-flex>
                <v-btn color="info" large @click.native="searchMovies">Search</v-btn>
            </v-layout>
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
        </v-content>
    </v-app>
</template>

<script>
    import MenuComponent from './MenuComponent';
    export default {
        name: 'FindUpcoming',
        components: {
            'menu-component': MenuComponent
        },
        data() {
            return {
                movies: [],
                title: ""
            }
        },
        methods: {
            searchMovies() {
                if (this.title != '') {
                    axios
                        .get(`http://localhost:8080/api/movies/findupcoming/${this.title}`)
                        .then(response => {
                            this.movies = response['data']['data'];
                            console.log(this.movies);
                        });
                }
            }
        }
    }
</script>

<style>

</style>
