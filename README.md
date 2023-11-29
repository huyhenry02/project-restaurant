# Project Restaurant

## Mô tả

Dự án là một trang web nhà hàng được xây dựng bằng Laravel. Nó cung cấp các tính năng cơ bản để quản lý menu, đặt bàn và quản lý thông tin của nhà hàng.

## Yêu Cầu Hệ Thống

- PHP 8.1 trở lên
- Laragon hoặc Xampp
- MySQL

## Cài Đặt

1. Clone dự án về máy của bạn:

    ```bash
    git clone https://github.com/huyhenry02/project-restaurant.git
    ```

2. Di chuyển vào thư mục dự án:

    ```bash
    cd project-restaurant
    ```

3. Sao chép file `.env.example` thành `.env`:

    ```bash
    cp .env.example .env
    ```

4. Mở file `.env` và cấu hình thông tin cơ sở dữ liệu của bạn.

5. Tạo khóa ứng dụng mới:

    ```bash
    php artisan key:generate
    ```

6. Chạy các migrations và seed dữ liệu mẫu:
    Tạo 1 database trong  CSDL
     ```bash
   create database restaurants
    ```
   Chạy migrate tạo các bảng
    ```bash
    php artisan migrate
    ```
   Chạy file query seed_data.sql trong CSDL của bạn để insert dữ liệu. Sau đó chạy câu lệnh sau để có tài khoản login
    ```bash
   php artisan db:seed
    ```

7. Chạy máy chủ phát triển:

    ```bash
    php artisan serve --port=8057
    ```

   Truy cập ứng dụng qua địa chỉ [http://localhost:8057](http://localhost:8057).

## Các Tính Năng

- **Quản lý Menu:** Thêm, sửa, xóa món ăn và danh mục.
- **Đặt bàn:** Khách hàng có thể đặt bàn trước qua trang web.
- **Quản lý bàn:** Nhân viên có thể quản lý bàn qua trang.
- **Quản Lý Thông Tin Nhà Hàng:** Cập nhật thông tin nhà hàng, địa chỉ, liên hệ, vv.

## Đóng Góp

Nếu bạn muốn đóng góp vào dự án, hãy tạo pull request và chúng ta sẽ xem xét và tích hợp vào mã nguồn chính.

## Bản Quyền 

Trang web này được thực hiện bởi Developer Đức Huy

---

Cảm ơn bạn đã quan tâm đến dự án của chúng tôi! Nếu bạn có bất kỳ câu hỏi hoặc đề xuất nào, vui lòng liên hệ  sandbox.duchuy02@gmail.con
