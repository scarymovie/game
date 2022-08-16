<template>
      <div>
          <div>
              <router-link :to="{ name: 'Home' }">Главная</router-link> |
              <router-link :to="{ name: 'Login' }">Авторизоваться</router-link>
          </div>

          <router-view></router-view>

      </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
