import request from '@/utils/request'

export function getList(params) {
  return request({
    url: '/api/admin',
    method: 'get',
    params
  })
}
