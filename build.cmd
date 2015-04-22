REM 7z.exe a commandline compression app from 7-zip
del PolarTour.zip
move admin\polartour.xml polartour.xml
..\7z a -Y PolarTour.zip *.xml
..\7z a -Y PolarTour.zip admin
..\7z a -Y PolarTour.zip site
..\7z a -Y PolarTour.zip media
move polartour.xml admin\polartour.xml

