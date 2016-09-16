<template>
  <div class="header">
    <nav>
      <a v-link="{ path: '/home' }">Home</a>
    </nav>

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
  nav {
    position: absolute;
    line-height: 44px;
    a {
      color: #fff;
    }
  }

  .search {
    padding: 10px;
    border-radius: 2px;
    border: 0;
    width: 30%;
  }
}
</style>
