/*
 * @Author: your name
 * @Date: 2020-08-05 17:03:50
 * @LastEditTime: 2020-08-12 16:32:18
 * @LastEditors: 1045998323@qq.com
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin/src/plugins/request.js
 */
import axios from 'axios'
import defaultSettings from '../../config/setting'
import Cookie from '../plugins/cookie'
import { showLoading, hideLoading } from '../components/loading'
import { Message } from 'element-ui'
import store from '../store'

// create an axios instance
const service = axios.create({
  // baseURL: defaultSettings.ApibBaseUrl, // url = base url + request url
  // withCredentials: true, // send cookies when cross-domain requests
  timeout: defaultSettings.TimeOut // request timeout
})

// request 请求拦截器
service.interceptors.request.use(
  config => {
    showLoading()
    // do something before request is sent
    // config.headers['Content-Type'] = 'application/json;charset=utf-8'
    // 'Content-Type': "application/json;charset=utf-8"
    config.headers['Accept'] = 'application/vnd.alex_laravel.v1+json'
    if (Cookie.getToken()) {
      // let each request carry token
      // ['X-Token'] is a custom headers key
      // please modify it according to the actual situation
      config.headers['X-Token'] = Cookie.getToken()
      config.headers['Authorization'] = 'Bearer ' + Cookie.getToken()
    }
    return config
  },
  error => {
    hideLoading()
    // do something with request error
    console.log(error) // for debug
    return Promise.reject(error)
  }
)

// response 响应拦截器
service.interceptors.response.use(
  /**
   * If you want to get http information such as headers or status
   * Please return  response => response
  */

  /**
   * Determine the request status by custom code
   * Here is just an example
   * You can also judge the status by HTTP Status Code
   */
  response => {
    hideLoading()
    console.log(response)
    if (response && response.headers && response.headers.authorization) {
      console.log('刷新 token：' + response.headers.authorization.substring(7))
      // 刷新token
      store.commit('user/SET_TOKEN', response.headers.authorization.substring(7))
    }
    const res = response.data
    // if the custom code is not 20000, it is judged as an error.
    if (res.code !== 1) {
      Message({
        message: res.msg || 'Error',
        type: 'error',
        duration: 5 * 1000
      })
      // 50008: Illegal token; 50012: Other clients logged in; 50014: Token expired;
      if (res.code === 50008 || res.code === 50012 || res.code === 50014) {
        // to re-login
        // MessageBox.confirm('You have been logged out, you can cancel to stay on this page, or log in again', 'Confirm logout', {
        //   confirmButtonText: 'Re-Login',
        //   cancelButtonText: 'Cancel',
        //   type: 'warning'
        // }).then(() => {
        //   store.dispatch('user/resetToken').then(() => {
        //     location.reload()
        //   })
        // })
      }
      return Promise.reject(res.msg || 'Error')
    } else {
      return Promise.resolve(res || 'Success')
      // return res
    }
  },
  error => {
    hideLoading()
    console.log('err' + error) // for debug
    return Promise.reject(error)
  }
)

export default service
