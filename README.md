# Task Manager

## Langkah-langkah untuk Mengatur Environment dan Menjalankan Aplikasi

1. Clone repository:
    ```bash
    git clone https://github.com/fikri215/TaskManager
    cd TaskManager
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Buat file .env:
    ```bash
    cp .env.example .env
    ```

4. Sesuaikan konfigurasi database di file .env.

5. Jalankan generate key:
    ```bash
    php artisan key:generate
    ```

6. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```

7. Jalankan aplikasi:
    ```bash
    php artisan serve
    ```

## Penjelasan Setiap Endpoint

- `GET /tasks`: Menampilkan daftar semua tasks.
- `POST /tasks`: Menyimpan task baru.
- `GET /tasks/{id}`: Menampilkan detail task berdasarkan ID.
- `PUT /tasks/{id}`: Memperbarui task yang ada berdasarkan ID.
- `DELETE /tasks/{id}`: Menghapus task berdasarkan ID.
