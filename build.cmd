REM 7z.exe a commandline compression app from 7-zip
move /y media media_org
del PolarTour.zip
mkdir admin
mkdir site
mkdir media
xcopy /d /y /s media_org\com_polartour\*.* media\*.*
copy administrator\components\com_polartour\polartour.xml polartour.xml
xcopy /d /y /s administrator\components\com_polartour\*.* admin\*.*
xcopy /d /y /s components\com_polartour\*.* site\*.*
del admin\polartour.xml
..\7z a -Y PolarTour.zip media
rmdir /S /Q media
..\7z a -Y PolarTour.zip *.xml
..\7z a -Y PolarTour.zip admin
..\7z a -Y PolarTour.zip site
del polartour.xml
rmdir /S /Q admin
rmdir /S /Q site
move /Y media_org media

