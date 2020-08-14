/*
 * @Author: your name
 * @Date: 2020-08-05 14:29:20
 * @LastEditTime: 2020-08-13 14:51:32
 * @LastEditors: 1045998323@qq.com
 * @Description: 状态管理器
 * @FilePath: /alex_admin/src/store/index.js
 */

import Vue from 'vue'
import Vuex from 'vuex'
import UserModel from './modules/user'
import LayoutModel from './modules/layout'
import KeepAliveModel from './modules/keep'
Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    user: UserModel,
    layout: LayoutModel,
    keep: KeepAliveModel
  }
})

export default store
