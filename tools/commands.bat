echo OFF
cd ..
echo ********************************
echo --- Abriendo servidor mysql ---
echo ********************************
PAUSE 
START F:\xampp\mysql\bin\mysqld
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