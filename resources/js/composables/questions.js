import { ref } from 'vue'

export default function useQuestions() {
    const questions = ref([])

    const getQuestions = async (page=1) => {
    axios.get('/api/v1/questions?page=' + page)
        .then(response => {
        questions.value = response.data;
    })
    }

    return { questions, getQuestions }
}
