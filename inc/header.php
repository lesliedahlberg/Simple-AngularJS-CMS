<!DOCTYPE html>
<html ng-app="<?=$ng_app?>" ng-controller="<?=$ng_control?>">
  <head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <? if(!isset($title)){$title = $SETTINGS_title;} ?>
    <title><?=$title?> | {{title}}</title>

    <!-- CSS -->
    <? if(!isset($style_sheet)){$style_sheet = $SETTINGS_style_sheet;} ?>
    <? foreach ($style_sheet as $key => $style): ?>
      <!-- STYLE: <?=$key?> -->
      <link rel="stylesheet" type="text/css" href="<?=$style?>">
    <? endforeach; ?>

    <!-- JS -->
    <? if(!isset($java_script)){$java_script = $SETTINGS_java_script;} ?>
    <? foreach ($java_script as $key => $script): ?>
      <!-- SCRIPT: <?=$key?> -->
      <script src="<?=$script?>"></script>
    <? endforeach; ?>


  </head>
  <body>
