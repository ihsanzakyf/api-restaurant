# 🍽️ REST API – Food Ordering System

Sistem RESTful API berbasis **Laravel** untuk pemesanan makanan, mendukung tiga peran pengguna utama:

-   👤 **Customer**
-   🧑‍🍳 **Restaurant Manager**
-   👨‍💼 **Administrator**

---

## 🚀 Fitur Utama

### 👤 Customer

-   🔍 Melihat daftar restoran dan menu
-   🛒 Melakukan pemesanan makanan
-   💰 Membayar pesanan
-   🎁 Mendapatkan poin loyalti

### 🧑‍🍳 Restaurant Manager

-   🍽️ Mengelola item menu restoran
-   📦 Melihat daftar pesanan yang masuk ke restoran miliknya

### 👨‍💼 Administrator

-   ✅ Menyetujui atau menolak pendaftaran restoran baru
-   🧹 Menghapus akun pengguna
-   📊 Melihat data analytics (pesanan, pengguna, pendapatan)

---

## 🔐 Autentikasi

Login dilakukan melalui endpoint berikut:

```bash
POST /api/login

// Customer
{
"email": "budi@mail.com",
"password": "password"
}

// Administrator
{
"email": "admin@mail.com",
"password": "password"
}

// Manager
{
"email": "sari@mail.com",
"password": "password"
}

Authorization: Bearer {token}

👤 Customer

| Aksi                     | Method | Endpoint                     | Deskripsi                                |
| ------------------------ | ------ | ---------------------------- | ---------------------------------------- |
| 🔍 Lihat daftar restoran | GET    | `/api/restaurants`           | Menampilkan semua restoran & menunya     |
| 📋 Lihat menu restoran   | GET    | `/api/restaurants/{id}/menu` | Menampilkan menu berdasarkan ID restoran |
| 🎁 Lihat poin loyalti    | GET    | `/api/loyalty-points`        | Menampilkan poin loyalti user aktif      |
| 🛒 Buat pesanan          | POST   | `/api/orders`                | Membuat pesanan baru                     |
| 💳 Bayar pesanan         | POST   | `/api/payments`              | Membayar pesanan berdasarkan ID          |

🧑‍🍳 Restaurant Manager

| Aksi                   | Method | Endpoint                       | Deskripsi                             |
| ---------------------- | ------ | ------------------------------ | ------------------------------------- |
| 📦 Lihat pesanan masuk | GET    | `/api/manager/orders`          | Menampilkan pesanan masuk ke restoran |
| ➕ Tambah item menu    | POST   | `/api/manager/menu-items`      | Menambahkan item menu baru            |
| ✏️ Perbarui item menu  | PUT    | `/api/manager/menu-items/{id}` | Memperbarui item menu berdasarkan ID  |
| ❌ Hapus item menu     | DELETE | `/api/manager/menu-items/{id}` | Menghapus item menu                   |

👨‍💼 Administrator

| Aksi                     | Method | Endpoint                              | Deskripsi                                      |
| ------------------------ | ------ | ------------------------------------- | ---------------------------------------------- |
| 📊 Lihat analitik sistem | GET    | `/api/admin/analytics`                | Ringkasan performa sistem                      |
| ✅ Setujui restoran      | PUT    | `/api/admin/restaurants/{id}/approve` | Menyetujui pendaftaran restoran                |
| ❌ Tolak restoran        | PUT    | `/api/admin/restaurants/{id}/reject`  | Menolak pendaftaran restoran                   |
| 🧹 Hapus pengguna        | DELETE | `/api/admin/users/{id}`               | Menghapus akun user (admin, manager, customer) |

🧪 Teknologi yang Digunakan

-   ⚙️ Laravel 12
-   🛡️ Laravel Sanctum (API Authentication)
-   🗃️ MySQL / MariaDB
-   📮 Postman (Testing)
```
