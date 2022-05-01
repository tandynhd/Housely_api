# [VIEW WEBSITE](https://housely.nanob.top/library/home.php)
# Project Description
In today’s world, living in a dormitory has almost become an integral part of experiencing university life. However, living in a dorm also has its own problems, such as the outdated process required to pay for the monthly rent. Due to disadvantages such as these, we decided to create a website called “Housely” to make dormitory management more systematic. Our website helps with the billing process and appointment process.
Upon entering the website, the visitors will find themselves at the homepage. The homepage gives basic information of the website, including the number of users, the facilities, the services, as well as other useful links. In addition to the homepage, the website provides a page for registering new users and client / staff logins. There is also an admin page which is only accessible to admin and staff, with the main purpose of altering the data. From the client side, the website allows them to view their bill, ask for appointments with the staff, and check details regarding their rented room.
The website also employs api calls which helps show data such as the weather around the area and the map of the area. This is done with the help of two separate api calls such as:
https://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey for the weather
https://maps.googleapis.com/maps/api/js?key=AIzaSyAT5k-RhvFSVIuCALkpHhKgQx6SJUd9gpI for the map



# Functional
| Function  | Guest | User  | Admin |
| ------------- | ------------- | ------------- | ------------- |
| Dormitory Information  | :heavy_check_mark:  | :heavy_check_mark:  | :heavy_check_mark:  |
| Login  | :x:  |:heavy_check_mark:  | :heavy_check_mark:  |
| Logout  | :x:  |:heavy_check_mark:  | :heavy_check_mark:  |
| Register  | :heavy_check_mark:  | :heavy_check_mark:  | :x:  |
| Change Password  | :x:  |:heavy_check_mark:  | :heavy_check_mark:  |
| Book Services  | :x:  |:heavy_check_mark:  | :heavy_check_mark:  |
| Add Services  | :x:  |:x:  | :heavy_check_mark:  |
| Manage Services  | :x:  |:x:  | :heavy_check_mark:  |
| Edit User Information  | :x:  |:x:  | :heavy_check_mark:  |
| Generate Bill  | :x:  |:x:  | :heavy_check_mark:  |
| Receive Bill  | :x:  | :heavy_check_mark:  |:x:  |
| Upload Slip  | :x:  | :heavy_check_mark:  |:x:  |
| Weather API  | :heavy_check_mark:  | :heavy_check_mark:  |:heavy_check_mark:  |
| Map API  | :heavy_check_mark:  | :heavy_check_mark:  |:heavy_check_mark: |
