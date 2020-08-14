/*
 * @Author: your name
 * @Date: 2020-08-06 15:10:05
 * @LastEditTime: 2020-08-10 11:36:11
 * @LastEditors: Please set LastEditors
 * @Description: home下children路由
 * @FilePath: /alex_admin/src/router/Home/index.js
 */
const ChildRoute = [
  {
    path: 'home',
    name: 'HomeIndex',
    hidden: true,
    component: () => import('@/views/home/Index.vue'),
    meta: { title: '首页' }
  }
]

export {
  ChildRoute
}
