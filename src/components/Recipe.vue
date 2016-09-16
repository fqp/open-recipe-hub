<template>
  <div class="container-fluid">
    <div class="row recipe-image">
      <h1 class="title">{{ recipe.title }}</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="content">
          Ingredients
        </div>
      </div>
      <div class="col-md-8">
        <div class="content">
          {{ recipe.text }}
        </div>
      </div>
      <div class="col-md-2">
        <div class="content">
          Related
        </div>
      </div>
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
  display: flex;
  margin-bottom: 30px;
  .title {
    text-align: center;
    width: 100%;
    align-self: flex-end;
  }
}
.content {
  background-color: white;
  padding: 20px;
}
</style>
