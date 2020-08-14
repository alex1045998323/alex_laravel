/*
 * @Author: your name
 * @Date: 2020-08-06 15:10:05
 * @LastEditTime: 2020-08-07 15:02:27
 * @LastEditors: Please set LastEditors
 * @Description: home下children路由
 * @FilePath: /alex_admin/src/router/Home/index.js
 */
const ChildRoute = [
  {
    path: 'index',
    name: 'AdminIndex',
    component: () => import('@/views/admin/Index.vue'),
    icon: 'el-icon-user-solid',
    hidden: false,
    meta: { title: '管理员列表' }
  }
]

export {
  ChildRoute
}
