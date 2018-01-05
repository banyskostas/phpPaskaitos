<?php
const FOLDER = 1;
const FILE = 2;


$path = "..";


function readFolder($path)
{
    $files = [];
    if (is_dir($path)) {
        if (!isFileNotProcessable($path)) {
            $files[] = ['type' => FOLDER, 'path' => $path, 'name' => getPathFileName($path)];
        }
        $dir = opendir($path);
        while ($filename = readdir($dir)) {
            if (isFileNotProcessable($filename)) {
                continue;
            }

            if (is_dir($path . '/' . $filename)) {
                $files[] = readFolder($path . '/' . $filename);
            } else {
                $files[] = ['type' => FILE, 'path' => $path . '/' . $filename, 'name' => $filename];
            }
        }
        closedir($dir);
    } else {
        $files[] = ['type' => FILE, 'path' => $path, 'name' => getPathFileName($path)];
    }
    return $files;
}

function isFileNotProcessable($filename)
{
    return in_array($filename, ['.', '..']);
}

function getPathFileName($path)
{
    $arr = explode('/', $path);
    return count($arr) ? end($arr) : '';
}

$files = readFolder($path);

$ignorableFolders = ['.git', '.idea'];
$ignorableFiles = ['.gitignore'];

function processFileTree($files, $ignorableFolders, $ignorableFiles, $getOut = false)
{
    $html = '<ul>';

    foreach ($files as $key => $filesArr) {

        if (!array_key_exists('type', $filesArr)) {
            $html .= processFileTree($filesArr, $ignorableFolders, $ignorableFiles, true);
            continue;
        }

        $file = $filesArr;

        $continue = true;

        switch ($file['type']) {
            case FOLDER:
                if (in_array($file['name'], $ignorableFolders)) {
                    $continue = false;
                }

                if ($continue) {
                    $html .= '<li>' . $file['name'] . '</li>';
                }
                break;

            case FILE:
                if (in_array($file['name'], $ignorableFiles)) {
                    $continue = false;
                }
                if ($continue) {
//                    $html .= '<li>' . $file['name'] . '</li>';

                }
                break;
        }

        if (!$continue) {

            if ($getOut) {
                return '';
            } else {
                continue;
            }
        }

    }

    $html .= '</ul>';
    return $html;
}

echo processFileTree($files, $ignorableFolders, $ignorableFiles);