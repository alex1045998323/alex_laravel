import request from '@/utils/request'

export function login(data) {
  return request({
    url: '/api/admin/signin',
    method: 'post',
    data
  })
}

export function getInfo() {
  return request({
    url: '/api/admin/info',
    method: 'post'
  })
}

export function logout() {
  return request({
    url: '/api/admin/signout',
    method: 'post'
  })
}
