<template>
  <div class="container">
    <div class="row" v-for="row in recipes | chunk 4">
      <div v-for="recipe in row" class="col-md-3 top-margin">
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
  data () {
    return {
      recipes: [
        {
          title: 'Recipe 1',
          author: 'Wesley',
          tags: ['Italian', 'Mediterranean']
        },
        {
          title: 'Recipe 2',
          author: 'Freek',
          tags: ['Japanese']
        },
        {
          title: 'Recipe 3',
          author: 'Michiel',
          tags: ['Chinese']
        },
        {
          title: 'Recipe 4',
          author: 'Wesley',
          tags: ['Indian']
        },
        {
          title: 'Recipe 5',
          author: 'Freek',
          tags: ['Italian']
        }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.top-margin {
  margin-top: 30px;
}
.content {
  background-color: white;
}
</style>
