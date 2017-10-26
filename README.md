# Campus-Laravel

Campus-Laravel merupakan sebuah program sederhana yang mengimplementasikan sebuah kelas student. Kelas student memiliki sebuah method yang dapat memvalidasi nilai variable yang dimiliki oleh kelas tersebut. Terdapat sebuah unit testing untuk menguji validasi setiap method.

### Development

Program dibangun pada framework Laravel. Terdapat 3 file utama yang dibangun untuk menuntaskan kebutuhan program, yaitu
* [Student.php](https://github.com/fauzanriff/campus-laravel/blob/master/app/Student.php) - Kelas student beserta method.
* [StudentTest.php](https://github.com/fauzanriff/campus-laravel/blob/master/tests/Feature/StudentTest.php) - Unit test student.
* [..students_table.php](https://github.com/fauzanriff/campus-laravel/blob/master/database/migrations/2017_10_26_003417_create_students_table.php) - Migration file

### Run Testing

Testing dijalankan dengan memanggil phpunit sebagai berikut:

```sh
$ ./vendor/bin/phpunit
```
