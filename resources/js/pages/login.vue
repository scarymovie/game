<template>
    <div>
        <form @submit.prevent="login">
            <input type="text" id="phone" v-model="form.phone">
            <button type="submit">Войти</button>
        </form>
    </div>
</template>

<script>
import {reactive} from "vue";

export default {
    name: "Login",
    setup(){

        let form = reactive({
            phone: '',
        });

        const login = async () => {
            await axios.post('/api/login', form).then(res=>{
                console.log(res);
            })
        }

        return {
            form,
            login
        }

    }
}
</script>

<style scoped>

</style>
