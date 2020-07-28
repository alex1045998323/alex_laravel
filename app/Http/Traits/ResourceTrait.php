<?php
/**
 *|--------------------------------------------------------------------------
 *| Author     : 1045998323@qq.com
 *| Class      : ResourceTrait
 *| CreateTime ：11:02
 *| Notes      : 资源路由trait
 */
namespace App\Http\Traits;
use Illuminate\Http\Request;

trait ResourceTrait
{
    /**
     * @var 定义使用的逻辑层
     */
    protected $Service;
    /**
     * Display a listing of the resource.
     * 显示列表页面模板
     * method GET            /photos
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return self::responseJson($this->Service->getPaginate());
    }

    /**
     * Show the form for creating a new resource.
     * 显示新增页面表单模板
    *  method GET            /photos/create
     * @return \Illuminate\Http\Response
     */
    public function create(){
        echo '显示新增数据页面';
    }

    /**
     * Show the form for editing the specified resource.
     * 根据id显示编辑页面模板
     * method GET            /photos/{photo}/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        echo '显示编辑数据页面';
    }

    /**
     * Display the specified resource.
     * 根据id显示对应的数据
     * method GET           /photos/{photo}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        echo '获取指定数据';
    }

    /**
     * Store a newly created resource in storage.
     * 新增数据
     * method POST【新增】      /photos
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        return self::responseJson($this->Service->Create($request));
    }


    /**
     * Update the specified resource in storage.
     * 根据id修改对应的数据
     * method PUT/PATCH【修改】   /photos/{photo}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        return self::responseJson($this->Service->update($request,$id));
    }

    /**
     * Remove the specified resource from storage.
     * 根据id删除数据
     * method DELETE【删除】      /photos/{photo}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        return self::responseJson($this->Service->destroy($id));
    }
}