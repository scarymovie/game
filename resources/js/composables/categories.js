import { ref } from 'vue'

export default function useCategories() {
    const categories = ref({})

    const getCategories = async () => {
        axios.get('/api/v1/categories')
            .then(response => {
                categories.value = response.data;
            })
    }

    return { categories, getCategories }
}
