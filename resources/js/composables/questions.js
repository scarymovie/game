import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useQuestions() {
    const questions = ref([])
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getQuestions = async (page=1) => {
    axios.get('/api/v1/questions?page=' + page)
        .then(response => {
        questions.value = response.data;
    })

    }

    const storeQuestion = async (question) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/v1/questions', question)
            .then(response => {
                swal({
                    icon: 'success',
                    title: 'Post saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    return { questions, getQuestions, storeQuestion, validationErrors, isLoading }
}
