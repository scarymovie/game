<template>
    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
        <div class="align-middle content-center">
            <h1 class="text-3xl font-semibold text-center text-purple-700">Войти</h1>

            <form @submit.prevent="login" class="mt-6">
                <div>
                    <label for="phone" class="block text-sm text-gray-800 content-center">Номер телефона</label>
                    <input type="text" id="phone" v-model="form.phone" v-maska="'+7 (###) ### ####'" required
                           class='w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                </div>
                <div class="mt-4">
                    <div class="mt-6">
                        <div class="flex items-center justify-end mt-4">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 ml-4" :class="{ 'opacity-25': processing }" :disabled="processing">
                                Войти
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import { reactive } from "vue";
import { maska } from 'maska'
import useAuth from '../composables/auth'

export default {
    directives: { maska },
    setup() {
        const { form, validationErrors, processing, login } = useAuth()
        return { form, validationErrors, processing, login }
    }
    // setup(){
    //
    //     let form = reactive({
    //         phone: '',
    //     });
    //
    //     function getCsrf(){
    //         return axios.get('sanctum/csrf-cookie');
    //     }
    //
    //     function sendData(){
    //         return axios.post('/api/login', form)
    //     }
    //
    //     const login = async () => {
    //         axios.all([getCsrf(), sendData()])
    //             .then(res=>{
    //                     console.log(res);
    //             })
    //     }
    //
    //     return {
    //         form,
    //         login
    //     }
    //
    // }
}
</script>

