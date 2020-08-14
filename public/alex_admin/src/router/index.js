/*
 * @Author: your name
 * @Date: 2020-08-05 14:29:11
 * @LastEditTime: 2020-08-12 15:27:32
 * @LastEditors: 1045998323@qq.com
 * @Description: 路由管理器
 * @FilePath: /alex_admin/src/router/index.js
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import defaultSettings from '../../config/setting'
import Cookie from '../plugins/cookie'
import store from '../store'
import NProgress from 'nprogress' // progress bar
import 'nprogress/nprogress.css' // progress bar style
Vue.use(VueRouter)
/* Layout */
import Layout from '../views/layout'

import { ChildRoute as HomeChildRoute } from './children/home_child_route'
import { ChildRoute as AdminChildRoute } from './children/admin_child_route'
const routes = [
  {
    path: '/',
    name: 'Home',
    redirect: '/home',
    component: Layout,
    icon: 'el-icon-s-home',
    meta: { title: '首页' },
    hiden: false,
    children: HomeChildRoute
  },
  {
    path: '/admin',
    name: 'Admin',
    redirect: '/admin/index',
    component: Layout,
    icon: 'el-icon-s-custom',
    meta: { title: '权限管理' },
    hiden: false,
    children: AdminChildRoute
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('@/views/base/Login'),
    hidden: true
  },
  {
    path: '/404',
    name: 'NotFound',
    component: () => import('@/views/base/404'),
    hidden: true
  },
  // 404 page must be placed at the end !!!
  { path: '*', redirect: '/404', hidden: true }
]

const router = new VueRouter({
  scrollBehavior: () => ({ y: 0 }),
  mode: 'history',
  routes
})

const NoVerifyLoginPath = ['/login'] // no redirect path

router.beforeEach((to, form, next) => {
  NProgress.start()
  /* 路由发生变化修改页面title */
  var title = defaultSettings.title || 'default title'
  if (to.meta.title) {
    title = `${to.meta.title} - ${title}`
  }
  // set page title
  document.title = title
  // 检测token
  if (Cookie.getToken()) {
    if (to.path === '/login') {
      // if is logged in, redirect to the home page
      next({ path: '/' })
      return NProgress.done()
    }
    if (store.getters.user_name) {
      next()
      return NProgress.done()
    }
    try {
      // get user info
      store.dispatch('user/getInfo')
      next()
      return NProgress.done()
    } catch (error) {
      // remove token and go to login page to re-login
      store.dispatch('user/logout')
      next(`/login?redirect=${to.path}`)
      return NProgress.done()
    }
  }
  if (NoVerifyLoginPath.indexOf(to.path) !== -1) {
    // in the free login whitelist, go directly
    next()
    return NProgress.done()
  } else {
    // other pages that do not have permission to access are redirected to the login page.
    next(`/login?redirect=${to.path}`)
    return NProgress.done()
  }
})

router.afterEach((to, from) => {
})

const originalPush = VueRouter.prototype.push
VueRouter.prototype.push = function push(location) {
  return originalPush.call(this, location).catch(err => err)
}

export default router
