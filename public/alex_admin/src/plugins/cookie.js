/*
 * @Author: your name
 * @Date: 2020-08-06 10:39:21
 * @LastEditTime: 2020-08-07 17:48:59
 * @LastEditors: Please set LastEditors
 * @Description: 缓存管理器
 * @FilePath: /alex_admin/src/plugins/cookie.js
 */
import Cookies from 'js-cookie'
import defaultSettings from '../../config/setting'

const TokenKey = 'alex_laravel_token'

const SidebarStatusKey = 'sidebarStatus'

const Cookie = {
  // 获取缓存token
  getToken: () => {
    return Cookies.get(TokenKey)
  },
  // 缓存token
  setToken: (token) => {
    return Cookies.set(TokenKey, token, { expires: defaultSettings.CookieExpires ? defaultSettings.CookieExpires : 7 })
  },
  // 删除token
  removeToken: () => {
    return Cookies.remove(TokenKey)
  },
  // 获取菜单显示隐藏状态
  getSidebarStatus: () => {
    return Cookies.get(SidebarStatusKey)
  },
  // 缓存菜单状态
  setSidebarStatus: (sidebarStatus) => {
    return Cookies.set(SidebarStatusKey, sidebarStatus, { expires: defaultSettings.CookieExpires ? defaultSettings.CookieExpires : 7 })
  }
}

export default Cookie

