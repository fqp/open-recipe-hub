import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import _ from 'lodash'
import App from './App'

// import views
import HomeView from './components/Home'
import RecipeView from './components/Recipe'

Vue.use(VueRouter)
Vue.use(VueResource)

// Custom filters
Vue.filter('chunk', function (value, size) {
  return _.chunk(value, size)
})

Vue.filter('marked', function (value) {
  return window.marked(value)
})

export var router = new VueRouter()

router.map({
  '/home': {
    component: HomeView
  },
  '/recipe/:recipeId': {
    name: 'recipe',
    component: RecipeView
  }
})

router.redirect({
  '*': '/home'
})

router.start(App, 'app')
