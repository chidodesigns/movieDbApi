<template>

    <div>
        <div v-if="loading">Loading...</div>

        <div v-else>
            <div class="flex justify-between">

                <a href="#" class="text-blue-400" @click="$router.back()">
                    Back
                </a>

            <div class="relative">
                <router-link :to="'/movies/' + movie.movie_id + '/edit'" class="px-4 py-2 rounded text-sm text-green-500 border border-green-500 text-sm font-bold mr-2">Edit</router-link>
                <a href="#" class="px-4 py-2 border border-red-500 rounded text-sm font-bold text-red-500" @click="modal = !modal">Delete</a>

                <div v-if="modal" class="absolute bg-blue-900 text-white rounded-lg z-20 p-8 w-64 right-0 mt-2 mr-6">
                    <p>Are you sure you want to delete this record?</p>
                    <div class="flex items-center mt-6 justify-end">
                        <button @click="modal = !modal" class="text-white pr-4">Cancel</button>
                        <button @click="destroy" class="px-4 py-2 bg-red-500 rounded text-sm font-bold text-white">Delete</button>
                    </div>
                </div>

            </div>
             <div v-if="modal" class="bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10" @click="modal = !modal">
            </div>
        </div>

        <div class="flex items-center pt-6">
            <UserCircle :name="movie.title"/>
            <p class="pl-5 text-xl">{{ movie.title }}</p>
        </div>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm"> Director</p>
            <p class="pt-2 text-blue-400">{{movie.director}}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm"> Writers</p>
            <p class="pt-2 text-blue-400">{{movie.writers}}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm"> Stars</p>
            <p class="pt-2 text-blue-400">{{movie.stars}}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm"> Synopsis</p>
            <p class="pt-2 text-blue-400">{{movie.synopsis}}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm"> Storyline</p>
            <p class="pt-2 text-blue-400">{{movie.storyline}}</p>


        </div>

    </div>

</template>

<script>
    import UserCircle from '../components/UserCircle';

    export default {
        name: "MoviesShow",

        components: {
            UserCircle
        },

        mounted() {
            axios.get('/api/movies/' + this.$route.params.id)
                .then(response => {
                    this.movie = response.data.data;
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;

                    if (error.response.status === 404) {
                        this.$router.push('/movies');
                    }

                });
            },

        data: function () {
            return {
                loading: true,
                modal: false,
                movie: null,
            }
        },

        methods: {
            destroy: function () {

                axios.delete('/api/movies/' + this.$route.params.id)
                    .then(response => {
                        this.$router.push('/movies');
                    })
                    .catch(error => {
                        alert('Internal Error. Unable to delete movie.')
                    });


            }
        }
    }
</script>

<style scoped>

</style>
