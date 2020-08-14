/*
 * @Descripttion: LayoutModule
 * @version: 1.0
 * @Author: 1045998323@qq.com
 * @Date: 2020-08-12 15:00:07
 * @LastEditors: 1045998323@qq.com
 * @LastEditTime: 2020-08-13 15:10:56
 */

const KeepAliveModule = {
  namespaced: true,
  state: () => ({
    // 需要走缓存的路由组件name
    KeepAliveList: []
  }),
  // 直接更改 Vuex 的 store 中的状态，唯一方法是提交 mutation,必须为同步函数
  // 在vue组件中使用 this.$store.commit('xxx')
  mutations: {
    // 添加缓存路由组件name
    addKeepAliveList: (state, data) => {
      if (state.KeepAliveList.includes(data)) return
      state.KeepAliveList.push(data)
    },
    // 移除缓存路由组件name
    removeKeepAliveList: (state, data) => {
      state.KeepAliveList.splice(state.KeepAliveList.findIndex(item => item === data), 1)
    }
  },
  // Action 提交的是 mutation，而不是直接变更状态。Action 可以包含任意异步操作
  // 在vue组件中使用 this.$store.dispatch('xxx')
  actions: {},
  // 可以认为是store 的计算属性
  getters: {
    KeepAliveList: state => { return state.KeepAliveList }
  }
}

export default KeepAliveModule
