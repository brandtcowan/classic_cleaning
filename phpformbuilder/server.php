<?php
ini_set('display_errors', 1);

$form_class_path = dirname(__FILE__);

echo '<pre>$form_class_path          = ' . $form_class_path . '</pre>';
$plugins_path = $form_class_path . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR;

echo '<pre>$plugins_path             = ' . $plugins_path . '</pre>';

// reliable document_root (https://gist.github.com/jpsirois/424055)
$root_path = str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['SCRIPT_FILENAME']);

echo '<pre>$_SERVER[SCRIPT_NAME]     = ' . $_SERVER['SCRIPT_NAME'] . '</pre>';
echo '<pre>$_SERVER[SCRIPT_FILENAME] = ' . $_SERVER['SCRIPT_FILENAME'] . '</pre>';
echo '<pre>$root_path                = ' . $root_path . '</pre>';

// reliable document_root with symlinks resolved
$info = new \SplFileInfo($root_path);

var_dump($info);

$real_root_path = $info->getRealPath();

echo '<pre>$real_root_path           = ' . $real_root_path . '</pre>';

// sanitize directory separator
$form_class_path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $form_class_path);
$real_root_path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $real_root_path);

echo '<pre>$form_class_path          = ' . $form_class_path . '</pre>';
echo '<pre>$real_root_path           = ' . $real_root_path . '</pre>';

$plugins_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . ltrim(str_replace(array($real_root_path, DIRECTORY_SEPARATOR), array('', '/'), $plugins_path), '/');

echo '<pre>$plugins_url              = ' . $plugins_url . '</pre>';
