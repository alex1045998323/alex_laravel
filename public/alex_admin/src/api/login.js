/*
 * @Author: your name
 * @Date: 2020-08-07 18:00:41
 * @LastEditTime: 2020-08-07 18:37:44
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin1/src/api/login.js
 */
import request from '@/plugins/request'

const LoginApi = {
  signIn: (data) => {
    return request({
      url: '/api/admin/signin',
      method: 'post',
      data
    })
  },
  signOut: () => {
    return request({
      url: '/api/admin/signout',
      method: 'post'
    })
  },
  getInfo: () => {
    return request({
      url: '/api/admin/info',
      method: 'post'
    })
  }
}

export default LoginApi
