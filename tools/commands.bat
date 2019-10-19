echo OFF
cd ..
echo ********************************
echo --- Abriendo servidor mysql ---
echo ********************************
PAUSE 
START F:\xampp\mysql\bin\mysqld
echo ********************************
echo --- Abriendo servidor apache ---
echo ********************************
PAUSE 
START F:\xampp\apache\bin\httpd.exe
echo ********************************
echo --- Abriendo servidor php ---
echo ********************************
PAUSE
START php artisan serve
echo ***************************************************************
echo --- Ejecutando compilacion automatica de archivos js y scss ---
echo ***************************************************************
PAUSE
START npm run watch
echo ***************************************************************
echo --- Abriendo phpmyadmin y el sitio en desarrollo---
echo ***************************************************************
PAUSE
set phpmyadmin="http://localhost/phpmyadmin"
set localhost="http://localhost:8000"
START firefox.exe %phpmyadmin% %localhost%
echo ***************************************************************
echo --- FIN DE LA EJECUCCION PULSE UNA TECLA PARA CONTINUAR---
echo ***************************************************************
PAUSE
