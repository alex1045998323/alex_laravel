<?php

namespace App\Http\Services\Admin;
use Maatwebsite\Excel\Facades\Excel;
use App\Excel\Imports\AdminImport;
use App\Excel\Exports\AdminExport;
use App\Http\Repositories\AdminRepository;
use App\Http\Validator\AdminValidator;
use Illuminate\Http\Request;
use \Prettus\Validator\Exceptions\ValidatorException;

class AdminService extends \App\Http\Services\Common\BaseService
{
    public $ExportHeader = ['手机号','密码'];
    public function __construct (AdminRepository $repository,AdminValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * @param string $limit
     * @param array  $columns
     * @return mixed|void
     */
    public function getPaginate($limit='',$columns=['*']){
        $result = $this->repository->paginate($limit,$columns)->toArray();
        // todo    处理需要返回分页的数据格式等等
        return V(1,'获取成功',$result);
    }
    /**
     * 导入excel
     * @param $request
     */
    public function importExcel($request){
        try{
            // 上传文件
            $upload = upload($request,'excel');
            if($upload['code']==0) return response()->json($upload);
            $file_path = public_path($upload['data']['filepath']);
            Excel::import(new AdminImport(),$file_path);
            return response()->json(V(1,'上传成功'));
        }catch (\Exception $e){
            return response()->json(V(0,'文件上传失败,请重新上传'));
        }
    }
    /**
     * 导出excel
     * @param $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel($request){
        return Excel::download(new AdminExport($this->getExportData($request),'管理员列表',$this->ExportHeader),'管理员报表.xlsx');
    }

    public function getExportData($request){
        return $this->repository->all(['user_name','password'])->toArray();
    }
}
