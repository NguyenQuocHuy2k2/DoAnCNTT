# Đồ án CNTT - Xây dựng website bán đồ ăn trực tuyến

## Thành viên nhóm:
1. Hồ Duy Hoàng - 20110487
2. Nguyễn Quốc Huy - 20110089

## Xin chân thành cảm ơn cô và quý bạn đã theo dõi đồ án của chúng em

- Giao diện sử dụng trong đồ án tham khảo qua link: https://themewagon.com/theme_tag/free/

- Và link: https://themewagon.com/theme-categories/premium-templates/

## Công nghệ sử dụng:
- Front-end: HTML, Css, BootStrap
- Back-end: PhP

## Hướng dẫn sử dụng:

**Bước 1:** Tải sẵn và cài đặt phần mềm **xampp** và **git Bash**.

**Bước 2:** Sau đó vào thư mục **xampp** thường là trong ổ **C:** -> **htdocs** và click chuột phải vào **Open Git Bash Here**

**Bước 3:** Sau đó: git clone https://github.com/NguyenQuocHuy2k2/DoAnCNTT và nhấn **Enter**, folder đồ án sẽ được git vào trong **htdocs**

**Bước 4:** Khởi động **xampp** lên, sau đó **start Apache** và **start MySQL**. Mở Browser lên và nhập http://localhost/phpmyadmin/

**Bước 5:** Truy cập database tại **phpMyAdmin**, đặt database name là **bandoan** và chọn **utf8_general_ci**. Sau đó **create database**.

**Bước 6:** Vào database **bandoan** vừa tạo, nhấn **import**. Trong mục **File to import** chọn **Choose File**, sau đó chọn đến thư mục theo đường dẫn **xampp/htdocs/DoAnCNTT**, sau đó chọn file **bandoan.sql** và nhấn **Open**.

**Bước 7:** Cấu hình tại **xampp/htdocs/DoAnCNTT/config.php**
- **DB_NAME:** 'bandoan'
- **DB_USER** và **DB_PASSWORD:** theo như cài đặt thường **username:** 'root', và **password** để trống
- **DB_HOST:** 'localhost'
- **PORT:** Theo Port(s) của MySQL trong phầm mềm xampp, thường là 3306

**Bước 8:** Cấu hình tại **xampp/htdocs/DoAnCNTT/admin/config.php**
- **DB_NAME:** 'bandoan'
- **DB_USER** và **DB_PASSWORD:** theo như cài đặt thường **username:** 'root' và **password** để trống
- **DB_HOST:** 'localhost'
- **PORT:** Theo Port(s) của MySQL trong phầm mềm xampp, thường là 3306

**Bước 9:** Mở browser lên nhập **localhost/DoAnCNTT** để chạy đồ án. Chúc bạn thành công
- **Lưu ý:** 
  - username: hoang, pass: 123 -> để đăng nhập trang admin quản trị
  - username: huy, pass: 123 -> để đăng nhập với quyền là user


