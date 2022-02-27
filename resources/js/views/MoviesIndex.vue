<template>

    <MoviesList endpoint="/api/movies"/>

</template>

<script>
    import MoviesList from '../components/MoviesList';

    export default {
        name: "MoviesIndex",

        components: {
            MoviesList
        }
    }

</script>

<style scoped>

</style>
