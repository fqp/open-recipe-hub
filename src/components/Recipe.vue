<template>
  <div class="container-fluid">
    <div class="row recipe-image">{{ recipe.title }}</div>
  </div>
  <div class="container">
    <div class="row">
    </div>
  </div>
</template>

<script>
export default {
  props: {
    recipe: Object
  }
}
</script>

<style lang="scss" scoped>
.recipe-image {
  background-color: white;
  height: 250px;
  background-position: center center;
  background-size: cover;
}
</style>
