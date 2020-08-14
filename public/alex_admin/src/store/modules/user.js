/*
 * @Descripttion: UserModule
 * @version: 1.0
 * @Author: 1045998323@qq.com
 * @Date: 2020-08-12 14:40:26
 * @LastEditors: 1045998323@qq.com
 * @LastEditTime: 2020-08-12 15:25:00
 */
import Cookie from '@/plugins/cookie'
import LoginApi from '@/api/login'

const UserModule = {
  namespaced: true,
  state: () => ({
    token: '',
    user_name: ''
  }),
  // 直接更改 Vuex 的 store 中的状态，唯一方法是提交 mutation,必须为同步函数
  // 在vue组件中使用 this.$store.commit('xxx')
  mutations: {
    // 用户相关
    SET_TOKEN: (state, token) => {
      Cookie.setToken(token)
      state.token = token
    },
    SET_NAME: (state, name) => {
      state.user_name = name
    }
  },
  // Action 提交的是 mutation，而不是直接变更状态。Action 可以包含任意异步操作
  // 在vue组件中使用 this.$store.dispatch('xxx')
  actions: {
    // user login
    login({ commit }, userInfo) {
      const { user_name, password } = userInfo
      return new Promise((resolve, reject) => {
        LoginApi.signIn({ user_name: user_name.trim(), password: password }).then(response => {
          const { data } = response
          commit('SET_TOKEN', data.token)
          resolve()
        }).catch(error => {
          reject(error)
        })
      })
    },
    // get user info
    getInfo({ commit, state }) {
      return new Promise((resolve, reject) => {
        LoginApi.getInfo(state.token).then(response => {
          const { data } = response

          if (!data) {
            return reject('Verification failed, please Login again.')
          }

          const { user_name } = data
          commit('SET_NAME', user_name)
          resolve(data)
        }).catch(error => {
          reject(error)
        })
      })
    },
    // user logout
    logout({ commit, state }) {
      commit('SET_TOKEN', '')
      Cookie.removeToken()
    }
  },
  // 可以认为是store 的计算属性
  getters: {
    token: state => { return state.token },
    user_name: state => { return state.user_name }
  }
}

export default UserModule
