# Medix-World
 Our web application aims to address these issues by enhancing the visibility of doctors to patients, providing comprehensive information about available healthcare providers, and facilitating seamless appointment scheduling. Additionally, the application helps patients manage their medical history by storing reports, prescriptions, and other pertinent data digitally, thus improving diagnostic accuracy and reducing costs associated with repeated tests. By offering a paperless solution, our platform streamlines healthcare processes, benefiting both patients and healthcare providers alike.









```shell
# dont forget to install and npm install
composer install
npm install
# copy .env.example to .env
cp .env.example .env
# add a database name
cp DB_DATABASE=medix
# generate security key 
php artisan key:generate
# after connect your database via .env file
php artisan migrate:fresh
php artisan db:seed 
```
---