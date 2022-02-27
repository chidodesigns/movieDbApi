<template>
    <div>
        <form @submit.prevent=submitForm>

            <InputField name="title" label="Movie Title" :errors="errors" placeholder="Movie" @update:field="form.title = $event"/>

            <InputField name="director" label="Add Director" :errors="errors" placeholder="Director" @update:field="form.director = $event"/>

            <InputField name="writers" label="Add Writers" :errors="errors" placeholder="Writers" @update:field="form.writers = $event"/>

            <InputField name="stars" label="Add Stars" :errors="errors" placeholder="Starring Who?" @update:field="form.stars = $event"/>

            <InputField name="synopsis" label="Synopsis" :errors="errors" placeholder="Movie Synopsis" @update:field="form.synopsis = $event"/>

            <InputField name="storyline" label="Storyline" :errors="errors" placeholder="What Is The Movie Storyline" @update:field="form.storyline = $event"/>

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Add New Movie</button>
            </div>

        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default ({

        name: "MoviesCreate",

        components: {
            InputField
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
             axios.post('/api/movies', this.form)
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
