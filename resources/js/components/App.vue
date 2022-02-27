<template>

    <div class="h-screen bg-white">

        <div class="flex">

            <!-- navigation -->
            <div class="pl-6 bg-gray-200 w-48 h-screen border-r-2 border-gray-400">
                <nav class="pt-4">

                    <router-link to="/">
                       <h1 class=" text-blue-600 w-12 h-12">MoviesDbApi</h1>
                    </router-link>

                    <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Create</p>

                    <router-link to="/movies/create" class="flex items-center py-2 hover:text-blue-600 text-sm">
                        <i class="text-blue-600 w-3 h-3 fas fa-plus"></i>
                        <div class="tracking-wide pl-2">Add New Movie</div>
                    </router-link>

                    <p class="pt-12 text-gray-500 text-xs uppercase font-bold">General</p>
                      <router-link to="/movies" class="flex items-center py-2 hover:text-blue-600 text-sm">
                        <i class="text-blue-600 w-3 h-3 fas fa-film"></i>
                       
                        <div class="tracking-wide pl-2">My Movies</div>
                    </router-link>

                    <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Settings</p>
                    <router-link to="/logout" class="flex items-center py-2 hover:text-blue-600 text-sm">
                        <svg viewBox="0 0 24 24" class="fill-current text-blue-600 w-5 h-5"><path d="M21 3h-3.8c-.7 0-1.3-.6-1.3-1.3S16.5.4 17.2.4h5.1c.7 0 1.3.6 1.3 1.3v20.5c0 .7-.6 1.3-1.3 1.3h-5.1c-.7 0-1.3-.6-1.3-1.3 0-.7.6-1.3 1.3-1.3H21V3zm-6.9 7.7L8.6 5.2c-.5-.5-.6-1.3-.1-1.8s1.3-.5 1.8 0l7.7 7.7c.8.8.2 2.2-.9 2.2H1.8c-.7 0-1.3-.6-1.3-1.3 0-.7.6-1.3 1.3-1.3h12.3zm-1.6 4.8c.5-.5 1.3-.4 1.8.1s.4 1.3-.1 1.8l-3.8 3.2c-.5.5-1.3.4-1.8-.1-.6-.5-.5-1.3 0-1.7l3.9-3.3z"/></svg>
                        <div class="tracking-wide pl-2">Logout</div>
                    </router-link>
                </nav>
            </div>

            <div class="flex flex-col flex-1 h-screen overflow-y-hidden">

                <div class="h-16 px-6 border-b border-gray-400 flex items-center justify-between">

                    <h1>
                        {{title}}
                    </h1>

                    <div class="flex items-center">
                        <SearchBar />
                        <UserCircle :name="user.name" />
                    </div>

                </div>

                <div class="flex flex-col overflow-y-hidden flex-1">
                    <router-view class="p-6 overflow-x-hidden"></router-view>
                </div>

            </div>

        </div>

    </div>

</template>

<script>

    import UserCircle from './UserCircle';
    import SearchBar from '../components/SearchBar';

    export default {
        name: "App",

        props: [
            'user'
        ],

        components: {
            UserCircle,
            SearchBar
        },

        created() {

            this.title = this.$route.meta.title;

            window.axios.interceptors.request.use(
               (config) => {

                   if(config.method == 'get'){
                       config.url = config.url + '?api_token=' + this.user.api_token
                   }else{
                       config.data = {
                       ...config.data,
                       api_token: this.user.api_token
                     };
                   }
                   return config;


               }
            )
        },

        data: function () {
            return {
                title: '',
            }
        },

        watch: {

            $route(to, from) {
                this.title = to.meta.title;
            },

            title() {
                document.title = this.title + ' | MoviesDbApi - The Movies Listing App'
            }
        }

    }
</script>

<style scoped>

</style>
