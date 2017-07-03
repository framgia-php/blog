<?php

namespace App\Console\Commands;

use InvalidArgumentException;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class FileGenerateCommand extends Command
{
    /**
     * The name and signature of the file:generate console command.
     *
     * @var string
     */
    protected $signature = 'file:generate
        {name : The name of element (class, trait or interface)}
        {--type=class : The type of element for new file}
        {--stub=element : The stub file name for new file}';

    /**
     * The file:generate console command description.
     *
     * @var string
     */
    protected $description = 'Create a new element (class, trait or interface)';

    /**
     * The resources directory that locates all stub templates.
     *
     * @var string
     */
    protected $templateAssets = 'resources/assets/stubs';

    /**
     * The element template path from base path.
     *
     * @var array
     */
    protected $templatePath = 'resources/assets/stubs/element.stub';

    /**
     * Execute the file:generate console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->getNameInputArgument();

        $info = $this->getParseNameArgument($name);

        $type = $this->getTypeInputOption();

        $this->build($info['path'], $info['element'], $info['namespace'], $type);
    }

    /**
     * Get name input argument.
     *
     * @return string
     */
    protected function getNameInputArgument()
    {
        $name = $this->argument('name');

        $name = str_replace('\\', '/', $name);

        return trim($name);
    }

    /**
     * Get element and namespace that is parsed from given name.
     *
     * @param  string  $name
     * @return array
     */
    protected function getParseNameArgument($name)
    {
        $items = explode('/', $name);

        $element = array_pop($items);

        $path = $this->getRootPath() . '/' . implode('/', $items);
        $path = rtrim($path, '/');

        $namespace = App::getNamespace() . implode('\\', $items);
        $namespace = trim($namespace, '\\');

        return compact('path', 'element', 'namespace');
    }

    /**
     * Get type input option.
     *
     * @return string
     */
    protected function getTypeInputOption()
    {
        $type = $this->option('type');

        return trim($type);
    }

    /**
     * Get stub input option.
     *
     * @return string
     */
    protected function getStubInputOption()
    {
        $stub = $this->option('stub');

        return trim($stub);
    }

    /**
     * Build new element into file.
     *
     * @param  string  $path
     * @param  string  $element
     * @param  string  $namespace
     * @param  string  $type
     * @return void
     */
    protected function build($path, $element, $namespace, $type)
    {
        $this->makeDirectory($path);

        $filePath = $this->getFilePath($path, $element);

        $template = $this->getCompiledTemplate($type, $element, $namespace);

        $this->makeNewFileIfNotExists($filePath, $template);
    }

    /**
     * Make new directory to locate new element.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }
    }

    /**
     * Get file path.
     *
     * @param  string  $path
     * @param  string  $element
     * @return string
     */
    protected function getFilePath($path, $element)
    {
        return $path . '/' . $element . '.php';
    }

    /**
     * Make new file if not exists.
     *
     * @param  string  $filePath
     * @param  string  $template
     * @return void
     */
    protected function makeNewFileIfNotExists($filePath, $template)
    {
        if (File::exists($filePath)) {
            $this->error('['. $filePath .'] was already created.');
        } else {
            File::put($filePath, $template);

            $this->info('['. $filePath .'] was created successfully.');
        }
    }

    /**
     * Get compiled file template.
     *
     * @param  string  $type
     * @param  string  $element
     * @param  string  $namespace
     * @return string
     */
    protected function getCompiledTemplate($type, $element, $namespace)
    {
        $template = $this->getStubTemplate();

        return $this->replaceAll($template, [
            'type' => $type,
            'element' => $element,
            'namespace' => $namespace,
        ]);
    }

    /**
     * Get element stub template.
     *
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function getStubTemplate()
    {
        $stub = $this->getStubInputOption();

        $templatePath = $this->getStubFilePath($stub);

        if (File::exists($templatePath)) {
            return File::get($templatePath);
        }

        throw new FileNotFoundException('File ['. $this->templatePath .'] was not found.');
    }

    /**
     * Get stub file path of stub name.
     *
     * @param  string  $stub
     * @return string
     */
    protected function getStubFilePath($stub)
    {
        return $this->templateAssets . '/' . $stub . '.stub';
    }

    /**
     * Replace all keywords in template content.
     *
     * @param  string  $template
     * @param  array  $replacements
     * @return string
     */
    protected function replaceAll($template, array $replacements)
    {
        foreach ($replacements as $keyword => $replacement) {
            $search = 'Dummy' . Str::ucfirst($keyword);

            $template = Str::replaceFirst($search, $replacement, $template);
        }

        return $template;
    }

    /**
     * Get root directory that matched psr-4 autoloading with "App" root namespace.
     *
     * @return string
     */
    protected function getRootPath()
    {
        return 'app';
    }

    /**
     * Get "App" root namespace.
     *
     * @return string
     */
    protected function getRootNamespace()
    {
        return App::getNamespace();
    }
}
