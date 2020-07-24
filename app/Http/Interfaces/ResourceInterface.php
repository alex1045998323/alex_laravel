<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : ResourceInterface
 *| CreateTime ：11:02
 *| Notes      : 资源路由接口
 *|---------------------------------------------------------------------------
 *|  HTTP 方法     |  URI                     | Action        | Route Name    |
 *|---------------------------------------------------------------------------
 *|  GET          |   /photos                 |  index       | photos.index  |
 *|---------------------------------------------------------------------------
 *|  GET          |   /photos/create          |  create      | photos.create |
 *|---------------------------------------------------------------------------
 *|  GET          |   /photos/{photo}/edit    |  edit        | photos.edit   |
 *|---------------------------------------------------------------------------
 *|  GET          |   /photos/{photo}         |  show        | photos.show   |
 *|---------------------------------------------------------------------------
 *|  POST         |   /photos                 |  store       | photos.store  |
 *|---------------------------------------------------------------------------
 *|  PUT/PATCH    |   /photos/{photo}         |  update      | photos.update |
 *|---------------------------------------------------------------------------
 *|  DELETE       |   /photos/{photo}         |  destroy     | photos.destroy|
 *|---------------------------------------------------------------------------
 */

namespace App\Http\Interfaces;
use Illuminate\Http\Request;

interface ResourceInterface
{
    /**
     * Display a listing of the resource.
     * 显示列表页面模板
     * method GET            /photos
     * @return \Illuminate\Http\Response
     */
    public function index();

    /**
     * Show the form for creating a new resource.
     * 显示新增页面表单模板
    *  method GET            /photos/create
     * @return \Illuminate\Http\Response
     */
    public function create();

    /**
     * Show the form for editing the specified resource.
     * 根据id显示编辑页面模板
     * method GET            /photos/{photo}/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id);

    /**
     * Display the specified resource.
     * 根据id显示对应的数据
     * method GET           /photos/{photo}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id);

    /**
     * Store a newly created resource in storage.
     * 新增数据
     * method POST【新增】      /photos
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request);


    /**
     * Update the specified resource in storage.
     * 根据id修改对应的数据
     * method PUT/PATCH【修改】   /photos/{photo}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id);

    /**
     * Remove the specified resource from storage.
     * 根据id删除数据
     * method DELETE【删除】      /photos/{photo}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id);
}