<?php

namespace ArtisanBlade\Commands;

use ArtisanBlade\core\CreateFile;
use File;
use Illuminate\Console\Command;

class ArtisanBladeCommand extends Command
{
    public $signature = '
                        make:blade {name : The name of the view}
                        {--stub : Select a stub file to create file blade}?
                        ';

    public $description = 'Create a new view file blade.php';

    public function handle(): int
    {
        $input = str_replace(".blade.php", "", $this->argument("name"));
        $input = str_replace(".php", "", $input);

        try {
            $this->createBlade($input);
            $this->info($input.'.blade.php created successfully.');

            return self::SUCCESS;
        } catch (\Exception $exception) {
            return self::FAILURE;
        }
    }

    /**
     * create file blade
     * @param string $input
     * @throws \Exception
     */
    public function createBlade(string $input): void
    {
        $stubProperties = [];
        $filePath = app()->basePath()."/resources/views/".$this->getFilePath($input);
        $path = app()->basePath()."/resources/views/".$this->getPath($input);
        $stubPath = $this->genStubPath();

        // create folder
        if (! file_exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        new CreateFile(
            $stubProperties,
            $filePath,
            $stubPath
        );
    }

    /**
     * get stub file path
     * @param string $input
     * @return string
     */
    private function getFilePath(string $input): string
    {
        $explode = explode('/', $input);
        $filename = end($explode);
        if (count($explode) > 1) {
            $path = '';
            for ($i = 0; $i < count($explode) - 1; $i++) {
                $path .= '/'.$explode[$i];
            }

            return $path.'/'.$filename.".blade.php";
        } else {
            return $filename.'.blade.php';
        }
    }

    /**
     * get path stub
     * @param string $input
     * @return string
     */
    private function getPath(string $input)
    {
        $explode = explode('/', $input);
        if (count($explode) > 1) {
            $path = '';
            for ($i = 0; $i < count($explode) - 1; $i++) {
                $path .= '/'.$explode[$i];
            }

            return $path;
        } else {
            return '';
        }
    }

    /**
     * get stub path
     * @return string
     * @throws \Exception
     */
    private function genStubPath(): string
    {
        $resourcePath = app()->basePath()."/resources";
        $stubPath = __dir__ . '/stubs/blank.stub';


        // check config
        if (file_exists(config_path().'/artisan-blade.php')) {

            $config_template = config("artisan-blade.path");
            $config_default = config("artisan-blade.default");

            // check option
            if($this->option("stub")) {
                $stubName = str_replace(".stub", "", $this->argument("stub"));
                $stubPath = $resourcePath.'/'.$config_template.'/'.$stubName.'.stub';
            }

            if (! empty($config_template) && ! empty($config_default)) {
                $stubPath = $resourcePath.'/'.$config_template.'/'.$config_default.'.stub';
            }

            if (!file_exists($stubPath)) {
                throw new \Exception("File ".$stubPath." not found");
            }
        }

        return $stubPath;
    }
}
