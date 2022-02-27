<template>

    <div>
        <div v-if="loading">Loading...</div>

            <div v-else>

            <div v-if="movies.length === 0">
                <p> No movies yet. <router-link to="/movies/create">Get Started</router-link></p>
            </div>

            <div v-for="movie in movies" :key="movie.name">
              <router-link :to="'/movies/' + movie.data.movie_id" class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">
                <UserCircle :name="movie.data.title"/>
                <div class="pl-4">
                   <p class="text-blue-400 font-bold">{{movie.data.title}}</p>
                   <p class="text-gray-600"><span class="font-bold">Director:</span> {{movie.data.director}}</p>
                   <p class="text-gray-600"><span class="font-bold">Writers:</span> {{movie.data.writers}}</p>
                   <p class="text-gray-600"><span class="font-bold">Stars:</span> {{movie.data.stars}}</p>
                   <p class="text-gray-600"><span class="font-bold">Synopsis:</span> {{movie.data.synopsis}}</p>
                   <p class="text-gray-600"><span class="font-bold">Storyline:</span> {{movie.data.storyline}}</p>
                </div>
              </router-link>
            </div>

        </div>
    </div>

</template>

<script>
import UserCircle from './UserCircle';
export default {
    name: "MoviesList",

    components: {
        UserCircle
    },

    props: [
        'endpoint',
    ],

    mounted() {

            axios.get(this.endpoint)
                .then(response => {
                    this.movies = response.data.data
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                    alert('Unable to fetch movies.');
                });

        },

    data: function () {

        return {

            loading: true,
            movies:null

        }

    }
}
</script>

<style scoped>

</style>
