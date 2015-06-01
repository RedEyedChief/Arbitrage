<?php
$content   = array (
  0 => 
  array (
    'regex' => 'SailfishBrowser(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Sailfish Browser',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  1 => 
  array (
    'regex' => '(Iceape|SeaMonkey|gnuzilla)(?:/(\\d+[\\.\\d]+))?',
    'name' => '$1',
    'version' => '$2',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  2 => 
  array (
    'regex' => 'Camino(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Camino',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  3 => 
  array (
    'regex' => 'Fennec(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Fennec',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  4 => 
  array (
    'regex' => 'Firefox.*Tablet browser (\\d+[\\.\\d]+)',
    'name' => 'MicroB',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  5 => 
  array (
    'regex' => 'Avant Browser',
    'name' => 'Avant Browser',
    'version' => '',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  6 => 
  array (
    'regex' => 'Bunjalloo(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Bunjalloo',
    'version' => '$1',
  ),
  7 => 
  array (
    'regex' => 'Iceweasel(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Iceweasel',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  8 => 
  array (
    'regex' => 'WebPositive',
    'name' => 'WebPositive',
    'version' => '',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  9 => 
  array (
    'regex' => 'PaleMoon(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Pale Moon',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  10 => 
  array (
    'regex' => 'CometBird(?:/(\\d+[\\.\\d]+))?',
    'name' => 'CometBird',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  11 => 
  array (
    'regex' => 'IceDragon(?:/(\\d+[\\.\\d]+))?',
    'name' => 'IceDragon',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  12 => 
  array (
    'regex' => 'Flock(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Flock',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
      'versions' => 
      array (
        3 => 'WebKit',
      ),
    ),
  ),
  13 => 
  array (
    'regex' => 'Kapiko(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Kapiko',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  14 => 
  array (
    'regex' => 'Firefox/(\\d+[\\.\\d]+).*\\(Swiftfox\\)',
    'name' => 'Swiftfox',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  15 => 
  array (
    'regex' => 'Firefox(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Firefox',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  16 => 
  array (
    'regex' => '(BonEcho|GranParadiso|Lorentz|Minefield|Namoroka|Shiretoko)/(\\d+[\\.\\d]+)',
    'name' => 'Firefox',
    'version' => '$1 ($2)',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  17 => 
  array (
    'regex' => 'ANTGalio(?:/(\\d+[\\.\\d]+))?',
    'name' => 'ANTGalio',
    'version' => '$1',
  ),
  18 => 
  array (
    'regex' => '(?:Espial|Escape)(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'Espial TV Browser',
    'version' => '$1',
  ),
  19 => 
  array (
    'regex' => 'RockMelt(?:/(\\d+[\\.\\d]+))?',
    'name' => 'RockMelt',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  20 => 
  array (
    'regex' => 'Fireweb Navigator(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Fireweb Navigator',
    'version' => '$1',
  ),
  21 => 
  array (
    'regex' => '(?:Navigator|Netscape6)(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Netscape',
    'version' => '$1',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  22 => 
  array (
    'regex' => '(?:Opera Tablet.*Version|Opera/.+Opera Mobi.+Version|Mobile.+OPR)/(\\d+[\\.\\d]+)',
    'name' => 'Opera Mobile',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Presto',
      'versions' => 
      array (
        15 => 'Blink',
      ),
    ),
  ),
  23 => 
  array (
    'regex' => 'Opera Mini/(?:att/)?(\\d+[\\.\\d]+)',
    'name' => 'Opera Mini',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Presto',
    ),
  ),
  24 => 
  array (
    'regex' => 'Opera.+Edition Next.+Version/(\\d+[\\.\\d]+)',
    'name' => 'Opera Next',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Presto',
      'versions' => 
      array (
        15 => 'Blink',
      ),
    ),
  ),
  25 => 
  array (
    'regex' => '(?:Opera|OPR)[/ ](?:9.80.*Version/)?(\\d+[\\.\\d]+).+Edition Next',
    'name' => 'Opera Next',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Presto',
      'versions' => 
      array (
        15 => 'Blink',
      ),
    ),
  ),
  26 => 
  array (
    'regex' => '(?:Opera|OPR)[/ ](?:9.80.*Version/)?(\\d+[\\.\\d]+)',
    'name' => 'Opera',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Presto',
      'versions' => 
      array (
        15 => 'Blink',
      ),
    ),
  ),
  27 => 
  array (
    'regex' => 'rekonq(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Rekonq',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  28 => 
  array (
    'regex' => 'CoolNovo(?:/(\\d+[\\.\\d]+))?',
    'name' => 'CoolNovo',
    'version' => '$1',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  29 => 
  array (
    'regex' => 'Comodo[ _]Dragon(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Comodo Dragon',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
      'versions' => 
      array (
        28 => 'Blink',
      ),
    ),
  ),
  30 => 
  array (
    'regex' => 'ChromePlus(?:/(\\d+[\\.\\d]+))?',
    'name' => 'ChromePlus',
    'version' => '$1',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  31 => 
  array (
    'regex' => 'Conkeror(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Conkeror',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  32 => 
  array (
    'regex' => 'Konqueror(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Konqueror',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'KHTML',
      'versions' => 
      array (
        4 => '',
      ),
    ),
  ),
  33 => 
  array (
    'regex' => 'baidubrowser(?:[/ ](\\d+[\\.\\d]*))?',
    'name' => 'Baidu Browser',
    'version' => '$1',
  ),
  34 => 
  array (
    'regex' => '(?:(?:BD)?Spark|BIDUBrowser)[/ ](\\d+[\\.\\d]*)',
    'name' => 'Baidu Spark',
    'version' => '$1',
  ),
  35 => 
  array (
    'regex' => 'YaBrowser(?:/(\\d+[\\.\\d]*))?',
    'name' => 'Yandex Browser',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Blink',
    ),
  ),
  36 => 
  array (
    'regex' => 'Midori(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Midori',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  37 => 
  array (
    'regex' => 'Mercury(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Mercury',
    'version' => '$1',
  ),
  38 => 
  array (
    'regex' => 'Maxthon[ /](\\d+[\\.\\d]+)',
    'name' => 'Maxthon',
    'version' => '$1',
    'engine' => 
    array (
      'default' => '',
      'versions' => 
      array (
        3 => 'WebKit',
      ),
    ),
  ),
  39 => 
  array (
    'regex' => '(?:Maxthon|MyIE2|Uzbl)',
    'name' => 'Maxthon',
    'version' => '',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  40 => 
  array (
    'regex' => 'Puffin(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Puffin',
    'version' => '$1',
  ),
  41 => 
  array (
    'regex' => 'Iron(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Iron',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
      'versions' => 
      array (
        28 => 'Blink',
      ),
    ),
  ),
  42 => 
  array (
    'regex' => 'Epiphany(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Epiphany',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
      'versions' => 
      array (
        '2.9.16' => '',
        '2.28' => 'WebKit',
      ),
    ),
  ),
  43 => 
  array (
    'regex' => 'LBBrowser(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Liebao',
    'version' => '$1',
  ),
  44 => 
  array (
    'regex' => 'SE (\\d+[\\.\\d]+)',
    'name' => 'Sogou Explorer',
    'version' => '$1',
  ),
  45 => 
  array (
    'regex' => 'CrMo(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Chrome Mobile',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
      'versions' => 
      array (
        28 => 'Blink',
      ),
    ),
  ),
  46 => 
  array (
    'regex' => 'CriOS(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Chrome Mobile iOS',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  47 => 
  array (
    'regex' => 'Chrome(?:/(\\d+[\\.\\d]+))?.*Mobile',
    'name' => 'Chrome Mobile',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
      'versions' => 
      array (
        28 => 'Blink',
      ),
    ),
  ),
  48 => 
  array (
    'regex' => 'chromeframe(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Chrome Frame',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  49 => 
  array (
    'regex' => 'Chromium(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Chromium',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
      'versions' => 
      array (
        28 => 'Blink',
      ),
    ),
  ),
  50 => 
  array (
    'regex' => 'Chrome(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Chrome',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
      'versions' => 
      array (
        28 => 'Blink',
      ),
    ),
  ),
  51 => 
  array (
    'regex' => 'UC[ ]?Browser(?:[ /]?(\\d+[\\.\\d]+))?',
    'name' => 'UC Browser',
    'version' => '$1',
  ),
  52 => 
  array (
    'regex' => 'UCWEB(?:[ /]?(\\d+[\\.\\d]+))?',
    'name' => 'UC Browser',
    'version' => '$1',
  ),
  53 => 
  array (
    'regex' => '(?:Tizen|SLP) Browser(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Tizen Browser',
    'version' => '$1',
  ),
  54 => 
  array (
    'regex' => 'Blazer(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Palm Blazer',
    'version' => '$1',
  ),
  55 => 
  array (
    'regex' => 'Pre/(\\d+[\\.\\d]+)',
    'name' => 'Palm Pre',
    'version' => '$1',
  ),
  56 => 
  array (
    'regex' => '(?:hpw|web)OS/(\\d+[\\.\\d]+)',
    'name' => 'wOSBrowser',
    'version' => '$1',
  ),
  57 => 
  array (
    'regex' => 'WebPro(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Palm WebPro',
    'version' => '$1',
  ),
  58 => 
  array (
    'regex' => 'Jasmine(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Jasmine',
    'version' => '$1',
  ),
  59 => 
  array (
    'regex' => 'Lynx(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Lynx',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Text-based',
    ),
  ),
  60 => 
  array (
    'regex' => 'NCSA_Mosaic(?:/(\\d+[\\.\\d]+))?',
    'name' => 'NCSA Mosaic',
    'version' => '$1',
  ),
  61 => 
  array (
    'regex' => 'ABrowse(?: (\\d+[\\.\\d]+))?',
    'name' => 'ABrowse',
    'version' => '$1',
  ),
  62 => 
  array (
    'regex' => 'amaya(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Amaya',
    'version' => '$1',
  ),
  63 => 
  array (
    'regex' => 'AmigaVoyager(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Amiga Voyager',
    'version' => '$1',
  ),
  64 => 
  array (
    'regex' => 'Amiga-Aweb(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Amiga Aweb',
    'version' => '$1',
  ),
  65 => 
  array (
    'regex' => 'Arora(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Arora',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  66 => 
  array (
    'regex' => 'Beonex(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Beonex',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  67 => 
  array (
    'regex' => 'BlackBerry|PlayBook|BB10',
    'name' => 'BlackBerry Browser',
    'version' => '',
  ),
  68 => 
  array (
    'regex' => 'BrowseX \\((\\d+[\\.\\d]+)',
    'name' => 'BrowseX',
    'version' => '$1',
  ),
  69 => 
  array (
    'regex' => 'Charon(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'Charon',
    'version' => '$1',
  ),
  70 => 
  array (
    'regex' => 'Cheshire(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Cheshire',
    'version' => '$1',
  ),
  71 => 
  array (
    'regex' => 'Dillo(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Dillo',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Dillo',
    ),
  ),
  72 => 
  array (
    'regex' => 'Dolfin(?:/(\\d+[\\.\\d]+))?|dolphin',
    'name' => 'Dolphin',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  73 => 
  array (
    'regex' => 'Elinks(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Elinks',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Text-based',
    ),
  ),
  74 => 
  array (
    'regex' => 'Firebird(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Firebird',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  75 => 
  array (
    'regex' => 'Fluid(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Fluid',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  76 => 
  array (
    'regex' => 'Galeon(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Galeon',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  77 => 
  array (
    'regex' => 'Google Earth(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Google Earth',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  78 => 
  array (
    'regex' => 'HotJava(?:/(\\d+[\\.\\d]+))?',
    'name' => 'HotJava',
    'version' => '$1',
  ),
  79 => 
  array (
    'regex' => 'IBrowse(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'IBrowse',
    'version' => '$1',
  ),
  80 => 
  array (
    'regex' => 'iCab(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'iCab',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'iCab',
      'versions' => 
      array (
        4 => 'WebKit',
      ),
    ),
  ),
  81 => 
  array (
    'regex' => 'Sleipnir(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Sleipnir',
    'version' => '$1',
  ),
  82 => 
  array (
    'regex' => 'Lunascape(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'Lunascape',
    'version' => '$1',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  83 => 
  array (
    'regex' => 'IEMobile[ /](\\d+[\\.\\d]+)',
    'name' => 'IE Mobile',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  84 => 
  array (
    'regex' => 'MSIE (\\d+[\\.\\d]+).*XBLWP7',
    'name' => 'IE Mobile',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  85 => 
  array (
    'regex' => 'MSIE.*Trident/4.0',
    'name' => 'Internet Explorer',
    'version' => '8.0',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  86 => 
  array (
    'regex' => 'MSIE.*Trident/5.0',
    'name' => 'Internet Explorer',
    'version' => '9.0',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  87 => 
  array (
    'regex' => 'MSIE.*Trident/6.0',
    'name' => 'Internet Explorer',
    'version' => '10.0',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  88 => 
  array (
    'regex' => 'Trident/7.0',
    'name' => 'Internet Explorer',
    'version' => '11.0',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  89 => 
  array (
    'regex' => 'MSIE (\\d+[\\.\\d]+)',
    'name' => 'Internet Explorer',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  90 => 
  array (
    'regex' => 'IE[ /](\\d+[\\.\\d]++)',
    'name' => 'Internet Explorer',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Trident',
    ),
  ),
  91 => 
  array (
    'regex' => 'Kazehakase(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Kazehakase',
    'version' => '$1',
    'engine' => 
    array (
      'default' => '',
    ),
  ),
  92 => 
  array (
    'regex' => 'Kindle/(\\d+[\\.\\d]+)',
    'name' => 'Kindle Browser',
    'version' => '$1',
  ),
  93 => 
  array (
    'regex' => 'K-meleon(?:/(\\d+[\\.\\d]+))?',
    'name' => 'K-meleon',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Gecko',
    ),
  ),
  94 => 
  array (
    'regex' => 'Links(?: \\((\\d+[\\.\\d]+))?',
    'name' => 'Links',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Text-based',
    ),
  ),
  95 => 
  array (
    'regex' => 'UP.Browser(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Openwave Mobile Browser',
    'version' => '$1',
  ),
  96 => 
  array (
    'regex' => 'OmniWeb(?:/[v]?(\\d+[\\.\\d]+))?',
    'name' => 'OmniWeb',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  97 => 
  array (
    'regex' => 'Phoenix(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Phoenix',
    'version' => '$1',
  ),
  98 => 
  array (
    'regex' => 'Silk(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Mobile Silk',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'Blink',
    ),
  ),
  99 => 
  array (
    'regex' => '(?:NokiaBrowser|BrowserNG)(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Nokia Browser',
    'version' => '$1',
  ),
  100 => 
  array (
    'regex' => 'Series60/5\\.0',
    'name' => 'Nokia Browser',
    'version' => '7.0',
  ),
  101 => 
  array (
    'regex' => 'Series60/(\\d+[\\.\\d]+)',
    'name' => 'Nokia OSS Browser',
    'version' => '$1',
  ),
  102 => 
  array (
    'regex' => 'S40OviBrowser/(\\d+[\\.\\d]+)',
    'name' => 'Nokia Ovi Browser',
    'version' => '$1',
  ),
  103 => 
  array (
    'regex' => '^Nokia|Nokia[EN]?\\d+',
    'name' => 'Nokia Browser',
    'version' => '',
  ),
  104 => 
  array (
    'regex' => 'NetFrontLifeBrowser(?:/(\\d+[\\.\\d]+))?',
    'name' => 'NetFront Life',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'NetFront',
    ),
  ),
  105 => 
  array (
    'regex' => 'NetFront(?:/(\\d+[\\.\\d]+))?',
    'name' => 'NetFront',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'NetFront',
    ),
  ),
  106 => 
  array (
    'regex' => 'PLAYSTATION|NINTENDO 3|AppleWebKit.+ NX/\\d+\\.\\d+\\.\\d+',
    'name' => 'NetFront',
    'version' => '',
  ),
  107 => 
  array (
    'regex' => 'NetPositive(?:/(\\d+[\\.\\d]+))?',
    'name' => 'NetPositive',
    'version' => '$1',
  ),
  108 => 
  array (
    'regex' => 'Obigo[ ]?(?:InternetBrowser|Browser)?(?:[ /]([a-z0-9]*))?',
    'name' => 'Obigo',
    'version' => '$1',
  ),
  109 => 
  array (
    'regex' => 'Obigo|Teleca',
    'name' => 'Obigo',
    'version' => '',
  ),
  110 => 
  array (
    'regex' => 'Oregano(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Oregano',
    'version' => '$1',
  ),
  111 => 
  array (
    'regex' => '(?:Polaris|Embider)(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'Polaris',
    'version' => '$1',
  ),
  112 => 
  array (
    'regex' => 'SEMC-Browser(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'SEMC-Browser',
    'version' => '$1',
  ),
  113 => 
  array (
    'regex' => 'Shiira(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'Shiira',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  114 => 
  array (
    'regex' => 'Snowshoe(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Snowshoe',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  115 => 
  array (
    'regex' => 'Sunrise(?:Browser)?(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Sunrise',
    'version' => '$1',
  ),
  116 => 
  array (
    'regex' => 'Xiino(?:/(\\d+[\\.\\d]+))?',
    'name' => 'Xiino',
    'version' => '$1',
  ),
  117 => 
  array (
    'regex' => 'Android',
    'name' => 'Android Browser',
    'version' => '',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  118 => 
  array (
    'regex' => '(?:iPod|iPad|iPhone).+Version/(\\d+[\\.\\d]+)',
    'name' => 'Mobile Safari',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  119 => 
  array (
    'regex' => 'Version/(\\d+[\\.\\d]+).*Mobile.*Safari/',
    'name' => 'Mobile Safari',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  120 => 
  array (
    'regex' => '(?:iPod|iPhone|iPad)',
    'name' => 'Mobile Safari',
    'version' => '',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
  121 => 
  array (
    'regex' => 'Version/(\\d+[\\.\\d]+).*Safari/|Safari/\\d+',
    'name' => 'Safari',
    'version' => '$1',
    'engine' => 
    array (
      'default' => 'WebKit',
    ),
  ),
);
$expires_on   = 1428600235;
$cache_complete   = true;
?>