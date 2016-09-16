import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import App from './App'

// import views
import HomeView from './components/Home'
import RecipeView from './components/Recipe'

Vue.use(VueRouter)
Vue.use(VueResource)

export var router = new VueRouter()

router.map({
  '/home': {
    component: HomeView
  },
  '/recipe': {
    component: RecipeView
  }
})

router.redirect({
  '*': '/home'
})

router.start(App, 'app')
