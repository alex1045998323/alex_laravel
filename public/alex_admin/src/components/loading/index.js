/*
 * @Author: your name
 * @Date: 2020-08-08 14:58:54
 * @LastEditTime: 2020-08-08 15:09:29
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin/src/components/loading/index.js
 */
import { Loading } from 'element-ui'

let loadingCount = 0
let loading

const startLoading = () => {
  loading = Loading.service({
    lock: true,
    text: '加载中……'
    // background: 'rgba(0, 0, 0, 0.7)'
  })
}

const endLoading = () => {
  loading.close()
}

export const showLoading = () => {
  if (loadingCount === 0) {
    startLoading()
  }
  loadingCount += 1
}

export const hideLoading = () => {
  if (loadingCount <= 0) {
    return
  }
  loadingCount -= 1
  if (loadingCount === 0) {
    endLoading()
  }
}
