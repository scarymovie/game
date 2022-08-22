import {ref, reactive, inject} from 'vue'
import {useRouter} from "vue-router";

const user = reactive({
    phone: '',
})

export default function useAuth() {
    const processing = ref(false)
    const validationErrors = ref({})
    const router = useRouter()
    const swal = inject('$swal')

    const form = reactive({
        phone: '',
        remember: false
    })

    const login = async () => {
        if (processing.value) return

        processing.value = true
        validationErrors.value = {}

        axios.all([getCsrf(), sendData()])
            .then(response => {
                loginUser(response[1].data.phone)
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => processing.value = false)
    }

    const loginUser = async (response) => {
        user.phone = response
        localStorage.setItem('loggedIn', JSON.stringify(true))
        await router.push({name: 'Questions'})
    }

    function getCsrf() {
        return axios.get('sanctum/csrf-cookie');
    }

    function sendData() {
        return axios.post('/api/login', form)
    }

    // const logout = async () => {
    //     if (processing.value) return
    //
    //     processing.value = true
    //
    //     axios.post('/logout')
    //         .then(response => router.push({ name: 'login' }))
    //         .catch(error => {
    //             swal({
    //                 icon: 'error',
    //                 title: error.response.status,
    //                 text: error.response.statusText
    //             })
    //         })
    //         .finally(() => {
    //             processing.value = false
    //         })
    // }

    return {
        form,
        validationErrors,
        processing,
        login,
        user,
    }
}
