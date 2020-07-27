# alex_laravel
1. 基于 laravel6.0,dingo2.0, prettus/l5-repository 2.6 ,prettus/laravel-validation 1.2,tymon/jwt-auth 1.0
2. 路由部分 restful 资源路由
3. 其他需要修改的都可以根据继承的 Common 类，进行继承重写
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
   
