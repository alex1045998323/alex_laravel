<!--
 * @Author: 1045998323@qq.com
 * @Date: 2020-08-05 14:29:11
 * @LastEditTime: 2020-08-13 14:56:40
 * @LastEditors: 1045998323@qq.com
 * @Description: 后台布局容器
 * @FilePath: /alex_admin/src/views/layout/index.vue
-->
<template>
  <el-container>
    <!--左侧菜单-->
    <el-aside width="initial">
      <el-menu :router="menuRouter" :default-active="defaultActive" :collapse="isCollapse" class="el-menu-vertical" background-color="#304156" text-color="#bfcbd9" active-text-color="#409EFF" :collapse-transition="collapse_transition">
        <el-menu-item style="background-color: #1c2835 !important;">
          <img src="https://wpimg.wallstcn.com/69a1c46c-eb1c-4b46-8bd4-e9e686ef5251.png" class="sidebar-logo" :style="{ width:logoWidth+'px',height:logoHeight+'px'}">
          <span slot="title">Alex Laravel</span>
        </el-menu-item>

        <template v-for="route in routes">
          <template v-if="!route.hidden">
            <el-menu-item v-if="hasOneShowingChild(route.children)" :key="route.path" :index="route.path=='/'? '/home':route.path">
              <i class="el-icon-setting" />
              <span slot="title">{{ route.meta.title }}</span>
            </el-menu-item>
            <el-submenu v-else :key="route.path" :index="route.path">
              <template slot="title">
                <i class="el-icon-location" />
                <span slot="title">{{ route.meta.title }}</span>
              </template>
              <el-menu-item v-for="child in route.children" :key="child.path" :index="route.path +'/'+ child.path">{{ child.meta.title }}</el-menu-item>
            </el-submenu>
          </template>
        </template>
      </el-menu>
    </el-aside>
    <!--右侧内容区域-->
    <el-container>
      <!--头部-->
      <el-header class="v-header">
        <el-row>
          <el-col :span="1">
            <div style="text-align: left;">
              <i :class="iconClass" style="font-size:24px;z-index:100000;line-height:48px" @click="toogleSlideMenu" />
            </div>
          </el-col>
          <el-col :span="10">
            <div style="text-align: left; font-size: 12px;height:48px">
              <layout-breadcrumb class="breadcrumb-container" />
            </div>
          </el-col>

          <el-col :span="13">
            <div style="text-align: right; font-size: 12px;height:48px">
              <el-dropdown split-button type="primary" class="v-split-button">
                {{ user_name }}
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item @click.native="logOut">退出</el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
            </div>
          </el-col>
        </el-row>
      </el-header>

      <!--tab栏-->
      <el-row><layout-tabs /></el-row>
      <!--内容区域-->
      <el-main>
        <transition name="fade-transform" mode="out-in">
          <keep-alive :include="KeepAliveList">
            <router-view :key="key" />
          </keep-alive>
        </transition>
      </el-main>
    </el-container>
  </el-container>
</template>
<script>
import { mapState } from 'vuex'
import LayoutBreadcrumb from './LayoutBreadcrumb'
import LayoutTabs from './LayoutTabs'
export default {
  name: 'Layout',
  data() {
    return {
      isCollapse: false
    }
  },
  components: {
    LayoutBreadcrumb,
    LayoutTabs
  },
  computed: {
    ...mapState({
      user_name: state => state.user.user_name,
      KeepAliveList: state => state.keep.KeepAliveList
    }),
    key() {
      return this.$route.path
    },
    // 动态切换菜单时，icon 切换
    iconClass() {
      return this.isCollapse ? 'el-icon-s-unfold' : 'el-icon-s-fold'
    },
    // 菜单动画
    collapse_transition() {
      return true
    },
    // logo 设置部分
    logoWidth() {
      return 32
    },
    logoHeight() {
      return 32
    },
    // 默认路由菜单选中
    defaultActive() {
      return this.$route.path
    },
    // 配置所有路由
    routes() {
      return this.$router.options.routes
    },
    // 是否开启菜单路由
    menuRouter() {
      return true
    }
  },
  methods: {
    // 菜单显示隐藏
    toogleSlideMenu() {
      this.isCollapse = !this.isCollapse
    },
    // 是否含有子菜单
    hasOneShowingChild(children = []) {
      if (!children || children.length <= 0) return false
      var show = true
      children.forEach((item, index) => {
        if (item.hidden === false) show = false
      })
      return show
    },
    async logOut() {
      await this.$store.dispatch('user/logout')
      this.$router.push(`/login?redirect=${this.$route.fullPath}`)
    }
  }
}
</script>

<style scoped>
.el-container{height:100%;padding:0;margin:0;width:100%;}
.el-header {
    background-color: #F2F6FC;
    color: #333;
    line-height: 48px;
    height: 48px !important;
  }
  .el-aside {
    color: #333;
  }
  html,body {
    margin: 0;
    height: 100%;
  }
  .el-menu-vertical{
    text-align: left;
  }
  .el-menu-vertical .el-menu .el-menu-item{
    background-color: #1c2835 !important;
  }
  .sidebar-logo {
      width: 32px;
      height: 32px;
      vertical-align: middle;
      margin-right: 12px;
    }
  /deep/ .v-header .v-split-button .el-button--primary{
    color: white;
    background-color: rgb(48, 65, 86);
    border-color: rgb(48, 65, 86);
  }
  /* fade-transform */
  .fade-transform-leave-active,
  .fade-transform-enter-active {
    transition: all .5s;
  }

  .fade-transform-enter {
    opacity: 0;
    transform: translateX(-30px);
  }

  .fade-transform-leave-to {
    opacity: 0;
    transform: translateX(30px);
  }

</style>

<style lang="scss" scoped>
  .el-menu-vertical{
    text-align: left;
    height: 100vh;
    &:not(.el-menu--collapse) {
      width: 180px;
    }
  }
  .el-main {
    padding: 10px 20px;
    transition: width 0.28s;
  }
</style>
