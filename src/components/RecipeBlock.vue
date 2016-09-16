<template>
  <div class="recipe">
    <div class="tags">
      <span class="tag tag-primary" v-for="tag in recipe.tags">{{ tag }}</span>
    </div>
    <div class="description">
      <span class="title">
        {{ recipe.title }}
      </span>
      <span class="author">
        {{ recipe.author }}
      </span>
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
.recipe {
  border-radius: 3px;
  overflow: hidden;
  color: black;
  display: flex;
  height: 250px;
  background-color: white;
  position: relative;

  .tags {
    position: absolute;
    width: 100%;
    text-align: right;
    top: 3px;
    right: 5px;
    .tag {
      margin-left: 5px;
    }
  }

  .description {
    align-self: flex-end;
    width: 100%;
    color: white;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.6);

    .author {
      float: right;
    }
  }
}
</style>
