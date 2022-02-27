<template>
    <div>
        <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                Back
            </a>
        </div>

        <form @submit.prevent=submitForm>

            <InputField name="title" label="Movie Title" :errors="errors" placeholder="Movie Title" @update:field="form.title = $event" :data="form.title"/>

            <InputField name="director" label="Director" :errors="errors" placeholder="Director" @update:field="form.director = $event" :data="form.director"/>

            <InputField name="writers" label="Writers" :errors="errors" placeholder="Writers" @update:field="form.writers = $event" :data="form.writers"/>

            <InputField name="stars" label="Stars" :errors="errors" placeholder="stars" @update:field="form.stars = $event" :data="form.stars"/>

            <InputField name="synopsis" label="Synopsis" :errors="errors" placeholder="Synopsis" @update:field="form.synopsis = $event" :data="form.synopsis"/>

            <InputField name="storyline" label="Storyline" :errors="errors" placeholder="Storyline" @update:field="form.storyline = $event" :data="form.storyline"/>

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Save</button>
            </div>

        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default ({

        name: "MoviesEdit",

        components: {
            InputField
        },

        mounted(){
            axios.get('/api/movies/' + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data;
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
                form: {
                    'title':  '',
                    'director':  '',
                    'writers':  '',
                    'stars': '',
                    'synopsis': '',
                    'storyline': ''
                },
                errors: null,
            }
        },

        methods: {
           submitForm: function () {
             axios.patch('/api/movies/' + this.$route.params.id, this.form)
             .then(response => {
                 this.$router.push(response.data.links.self)
             })
             .catch(errors => {
                 this.errors = errors.response.data.errors;
             });
           }
        }

    })
</script>

<style scoped>

</style>
