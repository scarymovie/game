<template>
    <form @submit.prevent="storeQuestion(question)">
        <!-- Title -->
        <div>
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.name">
                    {{ message }}
                </div>
            </div>
            <label for="question-name" class="block font-medium text-sm text-gray-700">
                Название
            </label>
            <input id="question-name" type="text" v-model="question.name"
                   class="block mt-1 w-full rounded-md shadow-sm border-gray-300
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- Category -->
        <div class="mt-4">
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.category_id">
                    {{ message }}
                </div>
            </div>
            <label for="post-category" class="block font-medium text-sm text-gray-700">
                Категория
            </label>
            <select id="post-category" v-model="question.category_id"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300
                     focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" selected>-- Выберите категорию --</option>
                <option v-for="category in categories" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="mt-4">
            <button :disabled="isLoading" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded disabled:opacity-75 disabled:cursor-not-allowed">
                <div v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></div>
                <span v-if="isLoading">Грузится...</span>
                <span v-else>Сохранить</span>
            </button>
        </div>
    </form>
</template>

<script>
import {onMounted, reactive } from "vue";
import useCategories from "../../composables/categories";
import useQuestions from "../../composables/questions";

export default {
    setup() {
        const question = reactive({
            name: '',
            category_id: ''
        })

        const { categories, getCategories } = useCategories()
        const { storeQuestion, validationErrors, isLoading } = useQuestions()
        onMounted(() => {
            getCategories()
        })
        return { categories, question, storeQuestion, validationErrors, isLoading }
    },
    methods: {
        test() {
            console.log('Submitted')
        }
    }
}
</script>
