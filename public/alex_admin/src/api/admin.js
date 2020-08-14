/*
 * @Author: your name
 * @Date: 2020-08-11 18:14:40
 * @LastEditTime: 2020-08-13 18:44:26
 * @LastEditors: 1045998323@qq.com
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin/src/api/admin.js
 */
import request from '@/plugins/request'

const AdminApi = {
  getList: (params) => {
    return request({
      url: '/api/admin',
      method: 'get',
      params
    })
  },
  exportExcel: (params) => {
    return request({
      url: '/api/admin/export',
      method: 'get',
      responseType: 'blob'
    })
  }
}

export default AdminApi
