# alex_laravel
1. 框架基于 laravel6.0
2. 接口基于 dingo2.0
3. 代码架构设计基于prettus/l5-repository 2.6 ,prettus/laravel-validation
4. 登录token认证基于tymon/jwt-auth 1.0
5. http发起request请求基于 "guzzlehttp/guzzle": "^7.0"
6. excel 报表导入导出基于 "maatwebsite/excel": "^3.1"
7. 路由部分 restful 资源路由
8. 其他需要修改的都可以根据继承的 Common 类，进行继承重写
9. 代码设计 controller->service->repository->model
#### 使用说明

新增自动 一键生成 curd 架构文件
 
##### 1 配置数据库信息

1. 修改 .env
2. DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=test
   DB_USERNAME=root
   DB_PASSWORD=root
##### 2 动态生成文件
   1. 浏览器通过get访问domain_name/Artisan/AlexCreate/{module}/{name}
   2. 如 : alex.com/Artisan/AlexCreate/Api/Test
##### 3 修改   routes/api.php 或者其他路由文件
   1. 添加resource 路由
   2. 如 ：$api->resource('test','TestController');
#### 4 修改新生成的model 文件

#### 5 进行接口请求，
   1. 不使用dingo 的api ,直接进行rest请求
   2. 使用dingo的api, 进行postman ，根据dingo 请求方式进行请求
   
#### 6 自动生成showdoc 接口文档，
   1. 具体使用方法 https://www.showdoc.cc/page/741656402509783
   2. 根目录下执行./showdoc_api.sh app/Http/Controllers   当然这部分可以根据自己需要进行改写
   3. 示例: 当前项目  ./api_demo.test
   4. showdoc个人部署网址：http://www.mengyu520.com ，具体账号密码需要联系管理员【ALex Cui】添加
   
