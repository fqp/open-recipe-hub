<template>
  <div class="header">
    <input type="text" class="search" placeholder="Search recipes" />
  </div>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>
.header {
  width: 100%;
  background-color: #009fff;
  padding: 10px;
  text-align: center;
  .search {
    padding: 10px;
    border-radius: 2px;
    border: 0;
    width: 30%;
  }
}
</style>
