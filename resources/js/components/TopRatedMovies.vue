<template>
    <v-app>
        <menu-component/>
        <v-content>
            <v-container grid-list-md text-xs-center>
                <v-responsive>
                    <v-container fill-height>
                        <v-layout align-center>
                            <v-flex>
                                <h3 class="display-3">Top rated movies</h3>
                                <span class="subheading">Check the upcoming movies</span>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-responsive>
                <listtoprated-movies :page="page"></listtoprated-movies>
            </v-container>
        </v-content>
        <template>
            <div class="text-xs-center">
                <v-pagination
                    v-model="page"
                    :length="totalPage"
                ></v-pagination>
            </div>
        </template>
    </v-app>
</template>


<script>
    import ListTopRated from './ListTopRatedMovies';
    import MenuComponent from './MenuComponent';
    export default {
        name: 'TopRatedMovies',
        components: {
            'listtoprated-movies': ListTopRated,
            'menu-component': MenuComponent
        },
        mounted() {
            axios
                .get('http://localhost:8080/api/movies/totalpages')
                .then(response => {
                    let $result = response['data']['data'];
                    this.totalPage = $result[0];
                });
        },
        data() {
            return {
                page: 1,
                totalPage: 11
            }
        }
    }
</script>
