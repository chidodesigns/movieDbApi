<template>

    <div>
        <div v-if="loading">Loading...</div>

            <div v-else>

            <div v-for="movie in movies" :key="movie.name">
              <router-link :to="'/movies/' + movie.movie_id" class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">
                <UserCircle :name="movie.title"/>
                <div class="pl-4">
                   <p class="text-blue-400 font-bold">{{movie.title}}</p>
                   <p class="text-gray-600"><span class="font-bold">Director:</span> {{movie.director}}</p>
                   <p class="text-gray-600"><span class="font-bold">Writers:</span> {{movie.writers}}</p>
                   <p class="text-gray-600"><span class="font-bold">Stars:</span> {{movie.stars}}</p>
                   <p class="text-gray-600"><span class="font-bold">Synopsis:</span> {{movie.synopsis}}</p>
                   <p class="text-gray-600"><span class="font-bold">Storyline:</span> {{movie.storyline}}</p>
                </div>
              </router-link>
            </div>

        </div>
    </div>

</template>

<script>
import UserCircle from './UserCircle';
export default {
    name: "HomeComponent",

    components: {
        UserCircle
    },

    mounted() {

            axios.get('/api/movies-all')
                .then(response => {
                    console.log(response.data);
                    this.movies = response.data
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
