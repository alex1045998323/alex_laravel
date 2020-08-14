<!--
 * @Author: your name
 * @Date: 2020-08-10 10:50:55
 * @LastEditTime: 2020-08-13 14:58:12
 * @LastEditors: 1045998323@qq.com
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin/src/views/layout/Breadcrumb/index.vue
-->
<template>
  <el-scrollbar style="height:100%">
    <el-tag
      v-for="(item, index) in openTab"
      :key="item.name"
      :index="index"
      :closable="item.path!='/' || item.path!='/home'"
      :type="activeTabIndex == index ? '' : 'info'"
      :disable-transitions="false"
      @close="handleClose(index)"
      @click="handleClick(index)"
      style="margin:5px 2px"
    >
      <i v-if="activeTabIndex == index" class="el-icon-circle-check" />
      {{ item.title }}
    </el-tag>
    <div>
      <slot name="router_view" />
    </div>
  </el-scrollbar>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState({
      openTab: state => state.layout.openTab
    }),
    key() {
      return this.$route.path
    },
    activeTabIndex: {
      get() {
        return this.$store.state.layout.activeTabIndex
      },
      set(val) {
        this.$store.commit('layout/SET_ACTIVE_TAB_INDEX', val)
      }
    }
  },
  watch: {
    '$route': 'watchRoute'
  },
  mounted() {
    // 刷新时以当前路由做为tab加入tabs
    // 当前路由不是首页时，添加首页以及另一页到store里，并设置激活状态
    // 当当前路由是首页时，添加首页到store，并设置激活状态
    if (!this.openTab || this.openTab <= 0) {
      this.$store.commit('layout/ADD_TABS', { route: '/home', name: 'HomeIndex', title: '首页', type: '' })
      if (this.$route.path !== '/' && this.$route.path !== '/home') {
        this.$store.commit('layout/ADD_TABS', { route: this.$route.path, name: this.$route.name, title: this.$route.meta.title })
        this.$store.commit('keep/addKeepAliveList', this.$route.name)
      }
      for (var i in this.openTab) {
        if (this.openTab[i].route === this.$route.path) {
          this.$store.commit('layout/SET_ACTIVE_TAB_INDEX', i)
          break
        }
      }
    }
    this.$router.push(this.$route.path)
  },
  methods: {
    handleClose(index) {
      var tab = this.openTab[index]
      // 首页不删
      if (tab.route === '/' || tab.route === '/home') {
        return
      }
      this.$store.commit('layout/DELETE_TABS', index)
      this.$store.commit('keep/removeKeepAliveList', tab.name)
      if (Number(this.activeTabIndex) === Number(index)) {
        // 设置当前激活的路由
        if (this.openTab && this.openTab.length >= 0) {
          this.$store.commit('layout/SET_ACTIVE_TAB_INDEX', this.openTab.length - 1)
          this.$router.push({ path: this.openTab[this.activeTabIndex].route })
        } else {
          this.$router.push({ path: '/' })
        }
      }
    },
    handleClick(index) {
      this.$store.commit('layout/SET_ACTIVE_TAB_INDEX', index)
      this.$router.push({ path: this.openTab[index].route })
    },
    watchRoute(to, from) {
      // 判断路由是否已经打开
      // 已经打开的 ，将其置为active
      // 未打开的，将其放入队列里
      let flag = false
      var openTab = this.$store.state.layout.openTab
      for (var i in openTab) {
        var item = openTab[i]
        if (item.name === to.name) {
          this.$store.commit('layout/SET_ACTIVE_TAB_INDEX', i)
          flag = true
          break
        }
      }
      if (!flag) {
        this.$store.commit('layout/ADD_TABS', { route: to.path, name: to.name, title: to.meta.title })
        this.$store.commit('keep/addKeepAliveList', to.name)
        this.$store.commit('layout/SET_ACTIVE_TAB_INDEX', openTab.length - 1)
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.el-scrollbar .el-scrollbar__wrap .el-scrollbar__view{
   white-space: nowrap;
}
.el-tag{
  cursor: pointer;
}
</style>
