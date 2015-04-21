REM 7z.exe a commandline compression app from 7-zip
del PolarTour.zip
mkdir admin
mkdir site
copy administrator\components\com_polartour\polartour.xml polartour.xml
xcopy /d /y /s administrator\components\com_polartour\*.* admin\*.*
xcopy /d /y /s components\com_polartour\*.* site\*.*
del admin\polartour.xml
..\7z a -Y PolarTour.zip *.xml
..\7z a -Y PolarTour.zip admin
..\7z a -Y PolarTour.zip site
del polartour.xml
rmdir /S /Q admin
rmdir /S /Q site

