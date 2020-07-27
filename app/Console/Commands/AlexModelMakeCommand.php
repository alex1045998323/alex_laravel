<?php

namespace App\Console\Commands;

//use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class AlexModelMakeCommand extends GeneratorCommand
{
    protected $name = 'make:AlexModel';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:AlexModel {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command a new Model class';

    protected $type = 'Model';

    /**
     * 设置模板地址
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }
    /**
     * 设置命名空间,以及文件路径
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Models'; //偷懒、直接写死
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $name  = $name.'Model';
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * 设置类名和自定义替换内容
     * @param string $stub
     * @param string $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        // 获取模块
        $class   = str_replace($this->getNamespace($name).'\\', '', $name);
        $model = $class.'Model';
        return str_replace('DummyClass', $model, $stub);
    }
}
