<template>
  <div id="app">
    <a v-link="{ path: '/home' }">Home</a>
    <a v-link="{ path: '/recipe' }">Recipe</a>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  components: {
  }
}
</script>

<style lang="scss">

</style>
