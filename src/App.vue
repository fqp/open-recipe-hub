<template>
  <header-bar></header-bar>
  <div id="app">
    <alert :show.sync="showRight" placement="top-right" duration="3000" type="success" width="400px" dismissable>
      <span class="icon-ok-circled alert-icon-float-left"></span>
      <strong>Well Done!</strong>
      <p>You successfully read this important alert message.</p>
    </alert>
    <router-view :recipes="recipes"></router-view>
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
  ready () {
    this.$http.get('http://37.139.9.54:80/allthethings/').then((response) => {
      this.recipes = response.body
    }, (response) => {
      console.log('boo!')
    })
  },
  data () {
    return {
      showRight: false,
      recipes: []
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
