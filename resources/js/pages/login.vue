<template>
    <div>
        <form>
            {{ form }}
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

        return {form}

    }
}
</script>

<style scoped>

</style>
