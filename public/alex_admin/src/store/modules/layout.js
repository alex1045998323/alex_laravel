/*
 * @Descripttion: LayoutModule
 * @version: 1.0
 * @Author: 1045998323@qq.com
 * @Date: 2020-08-12 15:00:07
 * @LastEditors: 1045998323@qq.com
 * @LastEditTime: 2020-08-12 15:37:34
 */

const LayoutModule = {
  namespaced: true,
  state: () => ({
    // 所有打开的路由
    openTab: [],
    // 激活的路由
    activeTabIndex: '/home'
  }),
  // 直接更改 Vuex 的 store 中的状态，唯一方法是提交 mutation,必须为同步函数
  // 在vue组件中使用 this.$store.commit('xxx')
  mutations: {
    // 添加tabs
    ADD_TABS: (state, data) => {
      state.openTab.push(data)
    },
    // 删除tabs
    DELETE_TABS: (state, index) => {
      state.openTab.splice(index, 1)
    },
    // 设置当前选中的tab
    SET_ACTIVE_TAB_INDEX: (state, index) => {
      state.activeTabIndex = index
    }
  },
  // Action 提交的是 mutation，而不是直接变更状态。Action 可以包含任意异步操作
  // 在vue组件中使用 this.$store.dispatch('xxx')
  actions: {},
  // 可以认为是store 的计算属性
  getters: {
    activeTabIndex: state => state.activeTabIndex,
    openTab: state => state.openTab
  }
}

export default LayoutModule
