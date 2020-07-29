FORMAT: 1A

# Alex Laravel

# admin [/admin]
后台管理员资源路由

## 显示所有用户 [GET /admin]


# 后台用户登录接口

## 登录 [POST /admin/signin]


+ Request (application/json)
    + Headers

            Accept: application/vnd.alex_laravel.v1+json
    + Body

            {
                "username": "foo",
                "password": "bar"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 1,
                "msg": "登录成功",
                "data": []
            }

## 退出登录 [POST /admin/signout]


+ Request (application/json)
    + Headers

            Accept: application/vnd.alex_laravel.v1+json
            Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g

+ Response 200 (application/json)
    + Body

            {
                "code": 1,
                "msg": "退出成功",
                "data": []
            }

## 获取当前后台用户登录的信息 [POST /admin/info]


+ Request (application/json)
    + Headers

            Accept: application/vnd.alex_laravel.v1+json
            Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hbGV4X2xhcmF2ZWwuY29tXC9hcGlcL2FkbWluXC9zaWduaW4iLCJpYXQiOjE1OTU5MjMzNzAsImV4cCI6MTU5NTkyNjk3MCwibmJmIjoxNTk1OTIzMzcwLCJqdGkiOiJEaHhUbVVCQkVBR2MyVDZ6Iiwic3ViIjoxLCJwcnYiOiIxOGIwNTg2ZjU1ZjliNWFjNzc2ZjcyNTdlM2I4N2QzNjZmNmM1YzcxIn0.i3PIU0YO4B2uUHgUKD6Lm3A6yLehAUiebP5DGUTJo9g

+ Response 200 (application/json)
    + Body

            {
                "code": 1,
                "msg": "获取成功",
                "data": {
                    "id": 1,
                    "user_name": "15615898763",
                    "password": "123456"
                }
            }