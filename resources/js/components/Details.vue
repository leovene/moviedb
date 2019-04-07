<template>
    <v-app>
        <menu-component/>
        <v-content>
            <v-container grid-list-md text-xs-center>
                <v-responsive>
                    <v-container fill-height>
                        <v-layout align-center>
                            <v-flex>
                                <h3 class="display-3">About</h3>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-responsive>
                <upcoming-movies :page="page"></upcoming-movies>
            </v-container>
        </v-content>
        <v-content>
            <v-layout row>
                <v-flex xs12 sm6 offset-sm3>
                    <v-card>
                        <v-img :src="`https://image.tmdb.org/t/p/w500/${movie.poster_path}`"  height="650px"></v-img>

                        <v-card-title primary-title>
                            <div>
                                <div class="headline">{{ movie.title }}</div>
                                <span class="grey--text">Genre: {{movie.genre_ids}}</span> <---->
                                <span class="black--text">Release date: {{movie.release_date}}</span>
                            </div>
                        </v-card-title>

                        <v-slide-y-transition>
                            <v-card-text>
                                {{movie.overview}}
                            </v-card-text>
                        </v-slide-y-transition>

                        <v-card-actions>
                            <v-btn flat color="orange" @click="$router.push('/')">Back</v-btn>
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
        props: ['movie'],
        components: {
            'menu-component': MenuComponent
        },
        mounted() {
            console.log(this.movie);
        }
    }
</script>

<style>

</style>
