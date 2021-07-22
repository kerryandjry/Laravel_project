## 還原步驟


- clone
- 創建資料庫，給權限
- composer install
- 複製..env.example 改名 .env ， 進入.env連結資料庫
- php artisan key:generate
- php artisan migrate
- browser 127.0.0.1 右上login or register

