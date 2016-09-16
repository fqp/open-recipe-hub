<template>
  <div class="container-fluid">
    <div class="row recipe-image">
      <h1 class="title">Title goes here...</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="content">
          <ul>
            <li v-for="ingredient in recipe.meta.ingredients">
              {{ ingredient.ingredient }}
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div v-html="recipe.data | marked" class="content">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import _ from 'lodash'

export default {
  props: {
    recipes: Array
  },
  computed: {
    recipe: function () {
      var self = this
      return this.recipes[self.$route.params.recipeId]
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
