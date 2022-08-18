<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
<!--                            <router-link :to="{ name: 'Home' }"-->
<!--                                         active-class="border-b-2 border-indigo-400"-->
<!--                                         class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900-->
<!--                                          focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">-->
<!--                                Главная</router-link> |-->
                            <router-link :to="{ name: 'Questions' }"
                                         active-class="border-b-2 border-indigo-400"
                                         class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900
                                          focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                Главная</router-link>
                            <router-link :to="{ name: 'Login' }" active-class="border-b-2 border-indigo-400"
                                         class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900
                                          focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                Авторизоваться</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ currentPageTitle }}
                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12 min-w-0">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</template>

<script>
export default {
    computed: {
        currentPageTitle() {
            return this.$route.meta.title;
        }
    }
}
</script>
