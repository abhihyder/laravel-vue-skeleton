<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Artisan;

class SymlinkController extends Controller
{
    public function run()
    {
        Artisan::call('optimize:clear');
        $target = storage_path("app/public");
        $explode_base_path = explode(DIRECTORY_SEPARATOR, base_path());
        array_pop($explode_base_path);
        array_push($explode_base_path, 'storage');
        $path = implode(DIRECTORY_SEPARATOR, $explode_base_path);
        symlink($target, $path);
        return true;
    }
}