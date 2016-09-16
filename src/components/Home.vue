<template>
  <div class="container">
    <div class="row" v-for="row in recipes | chunk 4">
      <div v-for="recipe in row" class="col-md-3 top-margin" v-link="{name: 'recipe', params: { recipeId: recipe.id }}">
        <recipe-block class="content" :recipe="recipe"></recipe-block>
      </div>
    </div>
  </div>
</template>

<script>
import RecipeBlock from './RecipeBlock'

export default {
  components: {
    RecipeBlock
  },
  props: {
    recipes: Array
  }
}
</script>

<style lang="scss" scoped>
.top-margin {
  margin-top: 30px;
}
.content {
  background-color: white;
  cursor: pointer;
}
</style>
