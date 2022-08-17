<template>
    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
        <div class="min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">id</th>
                    <th class="px-6 py-3 bg-gray-50 text-left">Название</th>
                    <th class="px-6 py-3 bg-gray-50 text-left">Категория</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <tr v-for="question in questions.data" :key="questions.id">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ question.id }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ question.name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ question.category }}</td>
                </tr>
                </tbody>
            </table>
            <Pagination class="pt-4" :data="questions" @pagination-change-page="getQuestions"/>
        </div>
    </div>
</template>

<script>
import { onMounted } from "vue";
import useQuestions from "../composables/questions";

export default {
    setup(){
        const { questions, getQuestions } = useQuestions()
        onMounted(getQuestions)

        return { questions, getQuestions }
    }
}
</script>
