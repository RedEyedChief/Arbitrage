<?php
$content   = array (
  0 => 
  array (
    'regex' => 'Tizen',
    'name' => 'Tizen',
    'version' => '',
  ),
  1 => 
  array (
    'regex' => 'Sailfish|Jolla',
    'name' => 'Sailfish OS',
    'version' => '',
  ),
  2 => 
  array (
    'regex' => '(?:Ali)?YunOS[ /]?(\\d+[\\.\\d]+)?',
    'name' => 'YunOS',
    'version' => '$1',
  ),
  3 => 
  array (
    'regex' => '(?:Android|Adr)[ /](?:[a-z]+ )?(\\d+[\\.\\d]+)',
    'name' => 'Android',
    'version' => '$1',
  ),
  4 => 
  array (
    'regex' => 'Android|Silk-Accelerated=[a-z]{4,5}',
    'name' => 'Android',
    'version' => '',
  ),
  5 => 
  array (
    'regex' => 'AmigaOS[ ]?(\\d+[\\.\\d]+)',
    'name' => 'AmigaOS',
    'version' => '$1',
  ),
  6 => 
  array (
    'regex' => 'AmigaOS|AmigaVoyager|Amiga-AWeb',
    'name' => 'AmigaOS',
    'version' => '',
  ),
  7 => 
  array (
    'regex' => 'Arch ?Linux(?:[ /\\-](\\d+[\\.\\d]+))?',
    'name' => 'Arch Linux',
    'version' => '$1',
  ),
  8 => 
  array (
    'regex' => 'VectorLinux(?: package)?(?:[ /\\-](\\d+[\\.\\d]+))?',
    'name' => 'VectorLinux',
    'version' => '$1',
  ),
  9 => 
  array (
    'regex' => 'Linux; .*((?:Debian|Knoppix|Mint|Ubuntu|Kubuntu|Xubuntu|Lubuntu|Fedora|Red Hat|Mandriva|Gentoo|Sabayon|Slackware|SUSE|CentOS|BackTrack))[ /](\\d+[\\.\\d]+)',
    'name' => '$1',
    'version' => '$2',
  ),
  10 => 
  array (
    'regex' => '(Debian|Knoppix|Mint|Ubuntu|Kubuntu|Xubuntu|Lubuntu|Fedora|Red Hat|Mandriva|Gentoo|Sabayon|Slackware|SUSE|CentOS|BackTrack)(?:(?: Enterprise)? Linux)?(?:[ /\\-](\\d+[\\.\\d]+))?',
    'name' => '$1',
    'version' => '$2',
  ),
  11 => 
  array (
    'regex' => 'Windows Phone (?:OS)?[ ]?(\\d+[\\.\\d]+)',
    'name' => 'Windows Phone',
    'version' => '$1',
  ),
  12 => 
  array (
    'regex' => 'XBLWP7|Windows Phone',
    'name' => 'Windows Phone',
    'version' => '',
  ),
  13 => 
  array (
    'regex' => 'Windows CE',
    'name' => 'Windows CE',
    'version' => '',
  ),
  14 => 
  array (
    'regex' => '(?:IEMobile|Windows Mobile)(?: (\\d+[\\.\\d]+))?',
    'name' => 'Windows Mobile',
    'version' => '$1',
  ),
  15 => 
  array (
    'regex' => 'Windows NT 6.2; ARM;',
    'name' => 'Windows RT',
    'version' => '',
  ),
  16 => 
  array (
    'regex' => '(?:webOS|Palm webOS)(?:/(\\d+[\\.\\d]+))?',
    'name' => 'webOS',
    'version' => '$1',
  ),
  17 => 
  array (
    'regex' => '(?:PalmOS|Palm OS)(?:[/ ](\\d+[\\.\\d]+))?|Palm',
    'name' => 'palmOS',
    'version' => '$1',
  ),
  18 => 
  array (
    'regex' => 'Xiino(?:.*v\\. (\\d+[\\.\\d]+))?',
    'name' => 'palmOS',
    'version' => '$1',
  ),
  19 => 
  array (
    'regex' => 'CYGWIN_NT-6.4|Windows NT 6.4|Windows 10',
    'name' => 'Windows 10',
    'version' => '10',
  ),
  20 => 
  array (
    'regex' => 'CYGWIN_NT-6.3|Windows NT 6.3|Windows 8.1',
    'name' => 'Windows 8.1',
    'version' => '8.1',
  ),
  21 => 
  array (
    'regex' => 'CYGWIN_NT-6.2|Windows NT 6.2|Windows 8',
    'name' => 'Windows 8',
    'version' => '8',
  ),
  22 => 
  array (
    'regex' => 'CYGWIN_NT-6.1|Windows NT 6.1|Windows 7',
    'name' => 'Windows 7',
    'version' => '7',
  ),
  23 => 
  array (
    'regex' => 'CYGWIN_NT-6.0|Windows NT 6.0|Windows Vista',
    'name' => 'Windows Vista',
    'version' => 'Vista',
  ),
  24 => 
  array (
    'regex' => 'CYGWIN_NT-5.2|Windows NT 5.2|Windows Server 2003 / XP x64',
    'name' => 'Windows Server 2003',
    'version' => 'Server 2003',
  ),
  25 => 
  array (
    'regex' => 'CYGWIN_NT-5.1|Windows NT 5.1|Windows XP',
    'name' => 'Windows XP',
    'version' => 'XP',
  ),
  26 => 
  array (
    'regex' => 'CYGWIN_NT-5.0|Windows NT 5.0|Windows 2000',
    'name' => 'Windows 2000',
    'version' => '2000',
  ),
  27 => 
  array (
    'regex' => 'CYGWIN_NT-4.0|Windows NT 4.0|WinNT|Windows NT',
    'name' => 'Windows NT',
    'version' => 'NT',
  ),
  28 => 
  array (
    'regex' => 'CYGWIN_ME-4.90|Win 9x 4.90|Windows ME',
    'name' => 'Windows ME',
    'version' => 'ME',
  ),
  29 => 
  array (
    'regex' => 'CYGWIN_98-4.10|Win98|Windows 98',
    'name' => 'Windows 98',
    'version' => '98',
  ),
  30 => 
  array (
    'regex' => 'CYGWIN_95-4.0|Win32|Win95|Windows 95|Windows_95',
    'name' => 'Windows 95',
    'version' => '95',
  ),
  31 => 
  array (
    'regex' => 'Windows 3.1',
    'name' => 'Windows 3.1',
    'version' => '3.1',
  ),
  32 => 
  array (
    'regex' => 'Windows',
    'name' => 'Windows',
    'version' => '',
  ),
  33 => 
  array (
    'regex' => '(?:CPU OS|iPhone OS|iOS)[ _](\\d+(?:[_\\.]\\d+)*)',
    'name' => 'iOS',
    'version' => '$1',
  ),
  34 => 
  array (
    'regex' => '(?:iPhone|iPad|iPod)(?:.*Mac OS X.*Version/(\\d+\\.\\d+)|; Opera)?',
    'name' => 'iOS',
    'version' => '$1',
  ),
  35 => 
  array (
    'regex' => 'Mac OS X(?: (?:Version )?(\\d+(?:[_\\.]\\d+)+))?',
    'name' => 'Mac',
    'version' => '$1',
  ),
  36 => 
  array (
    'regex' => 'Mac (\\d+(?:[_\\.]\\d+)+)',
    'name' => 'Mac',
    'version' => '$1',
  ),
  37 => 
  array (
    'regex' => 'Darwin|Macintosh|Mac_PowerPC|PPC|Mac PowerPC',
    'name' => 'Mac',
    'version' => '',
  ),
  38 => 
  array (
    'regex' => 'CrOS [a-z0-9_]+ (\\d+[\\.\\d]+)',
    'name' => 'Chrome OS',
    'version' => '$1',
  ),
  39 => 
  array (
    'regex' => '(?:BB10;.+Version|Black[Bb]erry[0-9a-z]+|Black[Bb]erry.+Version)/(\\d+[\\.\\d]+)',
    'name' => 'BlackBerry OS',
    'version' => '$1',
  ),
  40 => 
  array (
    'regex' => 'RIM Tablet OS (\\d+[\\.\\d]+)',
    'name' => 'BlackBerry Tablet OS',
    'version' => '$1',
  ),
  41 => 
  array (
    'regex' => 'RIM Tablet OS|QNX|Play[Bb]ook',
    'name' => 'BlackBerry Tablet OS',
    'version' => '',
  ),
  42 => 
  array (
    'regex' => 'BlackBerry',
    'name' => 'BlackBerry OS',
    'version' => '',
  ),
  43 => 
  array (
    'regex' => 'Haiku',
    'name' => 'Haiku OS',
    'version' => '',
  ),
  44 => 
  array (
    'regex' => 'BeOS',
    'name' => 'BeOS',
    'version' => '',
  ),
  45 => 
  array (
    'regex' => 'Symbian/3.+NokiaBrowser/7\\.3',
    'name' => 'Symbian^3',
    'version' => 'Anna',
  ),
  46 => 
  array (
    'regex' => 'Symbian/3.+NokiaBrowser/7\\.4',
    'name' => 'Symbian^3',
    'version' => 'Belle',
  ),
  47 => 
  array (
    'regex' => 'Symbian/3',
    'name' => 'Symbian^3',
    'version' => '',
  ),
  48 => 
  array (
    'regex' => '(?:Series ?60|SymbOS|S60)(?:[ /]?(\\d+[\\.\\d]+|V\\d+))?',
    'name' => 'Symbian OS Series 60',
    'version' => '$1',
  ),
  49 => 
  array (
    'regex' => 'Series40',
    'name' => 'Symbian OS Series 40',
    'version' => '',
  ),
  50 => 
  array (
    'regex' => 'SymbianOS/(\\d+[\\.\\d]+)',
    'name' => 'Symbian OS',
    'version' => '$1',
  ),
  51 => 
  array (
    'regex' => 'MeeGo|WeTab',
    'name' => 'MeeGo',
    'version' => '',
  ),
  52 => 
  array (
    'regex' => 'Symbian OS|SymbOS',
    'name' => 'Symbian OS',
    'version' => '',
  ),
  53 => 
  array (
    'regex' => 'Nokia',
    'name' => 'Symbian',
    'version' => '',
  ),
  54 => 
  array (
    'regex' => '(?:Mobile|Tablet);.+Firefox/\\d+\\.\\d+',
    'name' => 'Firefox OS',
    'version' => '',
  ),
  55 => 
  array (
    'regex' => 'RISC OS(?:-NC)?(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'RISC OS',
    'version' => '$1',
  ),
  56 => 
  array (
    'regex' => 'Inferno(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Inferno',
    'version' => '$1',
  ),
  57 => 
  array (
    'regex' => 'bada(?:[ /](\\d+[\\.\\d]+))',
    'name' => 'Bada',
    'version' => '$1',
  ),
  58 => 
  array (
    'regex' => 'bada',
    'name' => 'Bada',
    'version' => '',
  ),
  59 => 
  array (
    'regex' => '(?:Brew MP|BREW|BMP)(?:[ /](\\d+[\\.\\d]+))',
    'name' => 'Brew',
    'version' => '$1',
  ),
  60 => 
  array (
    'regex' => 'Brew MP|BREW|BMP',
    'name' => 'Brew',
    'version' => '',
  ),
  61 => 
  array (
    'regex' => 'GoogleTV(?:[ /](\\d+[\\.\\d]+))?',
    'name' => 'Google TV',
    'version' => '$1',
  ),
  62 => 
  array (
    'regex' => 'AppleTV(?:/?(\\d+[\\.\\d]+))?',
    'name' => 'Apple TV',
    'version' => '$1',
  ),
  63 => 
  array (
    'regex' => 'WebTV/(\\d+[\\.\\d]+)',
    'name' => 'WebTV',
    'version' => '$1',
  ),
  64 => 
  array (
    'regex' => '(?:SunOS|Solaris)(?:[/ ](\\d+[\\.\\d]+))?',
    'name' => 'Solaris',
    'version' => '$1',
  ),
  65 => 
  array (
    'regex' => 'AIX(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'AIX',
    'version' => '$1',
  ),
  66 => 
  array (
    'regex' => 'HP-UX(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'HP-UX',
    'version' => '$1',
  ),
  67 => 
  array (
    'regex' => 'FreeBSD(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'FreeBSD',
    'version' => '$1',
  ),
  68 => 
  array (
    'regex' => 'NetBSD(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'NetBSD',
    'version' => '$1',
  ),
  69 => 
  array (
    'regex' => 'OpenBSD(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'OpenBSD',
    'version' => '$1',
  ),
  70 => 
  array (
    'regex' => 'DragonFly(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'DragonFly',
    'version' => '$1',
  ),
  71 => 
  array (
    'regex' => 'Syllable(?:[/ ]?(\\d+[\\.\\d]+))?',
    'name' => 'Syllable',
    'version' => '$1',
  ),
  72 => 
  array (
    'regex' => 'IRIX(?:[/ ]?(\\d+[\\.\\d]+))',
    'name' => 'IRIX',
    'version' => '$1',
  ),
  73 => 
  array (
    'regex' => 'OSF1(?:[/ ]?v?(\\d+[\\.\\d]+))?',
    'name' => 'OSF1',
    'version' => '$1',
  ),
  74 => 
  array (
    'regex' => 'Nintendo Wii',
    'name' => 'Nintendo',
    'version' => 'Wii',
  ),
  75 => 
  array (
    'regex' => 'PlayStation ?([3|4])',
    'name' => 'PlayStation',
    'version' => '$1',
  ),
  76 => 
  array (
    'regex' => 'Xbox|KIN\\.(?:One|Two)',
    'name' => 'Xbox',
    'version' => '360',
  ),
  77 => 
  array (
    'regex' => 'Nitro|Nintendo ([3]?DS[i]?)',
    'name' => 'Nintendo Mobile',
    'version' => '$1',
  ),
  78 => 
  array (
    'regex' => 'PlayStation ((?:Portable|Vita))',
    'name' => 'PlayStation Portable',
    'version' => '$1',
  ),
  79 => 
  array (
    'regex' => 'OS/2',
    'name' => 'OS/2',
    'version' => '',
  ),
  80 => 
  array (
    'regex' => 'Linux[^a-z]',
    'name' => 'GNU/Linux',
    'version' => '',
  ),
);
$expires_on   = 1428600235;
$cache_complete   = true;
?>