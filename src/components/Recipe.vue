<template>
  <div class="container-fluid">
    <div class="row recipe-image">{{ recipes[$route.params.recipeId].title }}</div>
  </div>
  <div class="container">
    <div class="row">
      {{ recipe.title }}
    </div>
  </div>
</template>

<script>
import _ from 'lodash'

export default {
  props: {
    recipes: Array
  },
  computed: {
    recipe: function () {
      var self = this

      var i = _.find(this.recipes, function (recipe) {
        return recipe.id === Number(self.$route.params.recipeId)
      })

      return i
    }
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
