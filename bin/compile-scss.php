<?php
require_once __DIR__ . '/../vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\OutputStyle;

$scss = new Compiler();
$scssDir = __DIR__ . '/../scss/';
$scss->setImportPaths($scssDir);
$scss->setOutputStyle(OutputStyle::EXPANDED);

try {
$mainScssPath = $scssDir . 'main.scss';

    if (!file_exists($mainScssPath)) {
        throw new Exception("Файл не найден по пути: " . realpath($scssDir) . "/main.scss");
    }

    $scssCode = file_get_contents($mainScssPath);

    $result = $scss->compileString($scssCode, $mainScssPath);
    $css = $result->getCss();

    $outputDir = __DIR__ . '/../public/css';
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0755, true);
    }

    $outputFile = $outputDir . '/style.css';
    file_put_contents($outputFile, $css);

    if (file_exists($outputFile) && filesize($outputFile) > 0) {
        echo "CSS успешно скомпилирован в public/css/style.css (" . filesize($outputFile) . " байт)\n";
    } else {
        throw new Exception("Файл записался некорректно или пуст.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}