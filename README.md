### Clone project
```
git clone https://github.com/ThanhVuNe/sheetTemplate.git
```

### Chạy cài thư viện cho project laravel
```
composer install
npm install
npm run build
```
### Copy env
```
cp .env.example.env
```
### Generate key cho ứng dụng
```
php artisan key:generate
```
### Thiết lập cấu hình cho DB trong env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```
### Clear config sau khi update env
```
php artisan config:clear
```
### Migrate database
```
php artisan migrate
```
### Tạo data mẫu cho dự án
```
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=TemplateSeeder 
```
### Chạy dự án
```
php artisan serve
```
