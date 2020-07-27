<?php

namespace App\Console\Commands;

//use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class AlexControllerMakeCommand extends GeneratorCommand
{
    protected $name = 'make:AlexController';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:AlexController {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command a new Controller class';

    protected $type = 'Controller';

    /**
     * 设置模板地址
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/controller.stub';
    }
    /**
     * 设置命名空间,以及文件路径
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Http\\Controllers'; //偷懒、直接写死
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
        $name  = $name.'Controller';
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
        $module = substr($this->argument('name'),0,strpos($this->argument('name'), '\\'));
        $class   = str_replace($this->getNamespace($name).'\\', '', $name);
        $controller = $class.'Controller';
        $service    = 'App\\Http\\Services\\'.$module.'\\'.$class.'Service';
        $stub = str_replace('DummyService', $service, $stub);
        $stub = str_replace('ServiceClass', $class.'Service', $stub);
        return str_replace('DummyClass', $controller, $stub);
    }
}
