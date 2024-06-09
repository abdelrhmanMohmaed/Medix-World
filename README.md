# Medix-World
 Our web application aims to address these issues by enhancing the visibility of doctors to patients, providing comprehensive information about available healthcare providers, and facilitating seamless appointment scheduling. Additionally, the application helps patients manage their medical history by storing reports, prescriptions, and other pertinent data digitally, thus improving diagnostic accuracy and reducing costs associated with repeated tests. By offering a paperless solution, our platform streamlines healthcare processes, benefiting both patients and healthcare providers alike.


## Features


- **For Doctors**
Manage Schedules and Appointments: Easily organize and update your availability.
Patient Data Management: Efficiently manage and update your patients' information.
Availability Toggle: Keep your availability status up-to-date for potential patients.
Patient Profile Access: View and manage detailed profiles for all your patients.
Medical History Updates: Add and update patient medical histories and records.
Rate View: See and manage ratings given by patients.
- **For Patients**
Doctor Search: Find doctors by specialty or location with advanced search filters.
Appointment Booking: Schedule appointments with ease directly through the app.
Doctor Ratings: View and submit ratings for doctors.
Medical History Management: Upload and organize all your medical documents and history.
Profile Information: Maintain a comprehensive medical profile to share with doctors.
Live Location Detection: Get recommendations for doctors near your current location.
Online Payment: Conveniently pay for services online through secure transactions.
- **Admin Dashboard**
Approve Registrations: Review and approve doctor registration requests.
Data Update Requests: Approve or deny requests from doctors to update their information.
Client Activity Monitoring: Monitor and analyze user activities within the system.
Account Management: Activate or deactivate user accounts as needed.
Edit Terms and Conditions: Update the system's terms and conditions as necessary.
User Action Control: Manage and control user actions in accordance with system policies.
- **General Features**
System Notifications: Receive important updates and notifications.
Medical Paper Uploads: Upload past medical papers for easy access.
Real-time Updates: Stay informed with real-time notifications and updates.

## Technologies Used:

- **Backend:** PHP (Laravel)
- **Frontend:** HTML5, CSS, JavaScript, Bootstrap
- **Database:** MySQL

## Usage:

1. Clone the repository to your local machine.
2. Install dependencies using Composer for PHP and npm.
3. Configure the database settings in the `.env` file.
4. Run migrations and seed the database to set up the initial data.
5. Launch the application and begin registering child data and conducting therapy sessions.


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
