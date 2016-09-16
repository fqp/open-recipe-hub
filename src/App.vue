<template>
  <header-bar></header-bar>
  <div id="app">
    <alert :show.sync="showRight" placement="top-right" duration="3000" type="success" width="400px" dismissable>
      <span class="icon-ok-circled alert-icon-float-left"></span>
      <strong>Well Done!</strong>
      <p>You successfully read this important alert message.</p>
    </alert>
    <button @click="showAlert">Show</button>
    <a v-link="{ path: '/home' }">Home</a>
    <a v-link="{ path: '/recipe' }">Recipe</a>
    <router-view></router-view>
  </div>
</template>

<script>
import HeaderBar from './components/HeaderBar'
import { alert } from 'vue-strap'

export default {
  components: {
    HeaderBar,
    alert
  },
  data () {
    return {
      showRight: false
    }
  },
  methods: {
    showAlert: function () {
      this.showRight = true
    }
  }
}
</script>

<style lang="scss">
* {
  box-sizing: border-box;
  outline: 0;
}

html, #app {
  background-color: darken(white, 10%);
}
</style>
