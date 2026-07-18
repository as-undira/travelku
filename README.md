# Travelku - Engineering a Travel Agentic Ecosystem

## Summary
Travelku merupakan aplikasi web pemesanan paket wisata berbasis Laravel yang menerapkan konsep *agentic system* melalui fitur Loyalty Reward Optimizer. Sistem memungkinkan pengguna melakukan pemesanan paket wisata, pembayaran, pengelolaan booking, serta memperoleh reward dan diskon secara otomatis berdasarkan total jarak perjalanan yang telah diselesaikan.

---

# Demo
Live URL:
https://travelku-production.up.railway.app


---

# Features

## User
- Registrasi dan Login
- Melihat daftar paket wisata
- Melihat detail paket dan jadwal keberangkatan
- Melakukan booking paket wisata
- Pembayaran booking
- Melihat riwayat booking
- Membatalkan booking yang belum dibayar
- Sistem loyalty dan diskon otomatis

## Admin
- Dashboard admin
- CRUD Paket Wisata
- CRUD Jadwal Keberangkatan
- Monitoring seluruh booking
- Menyelesaikan perjalanan (*complete booking*)
- Menjalankan Loyalty Reward Optimizer

---

# Application Flow

```text
Guest
↓
Melihat Paket Wisata
↓
Login / Register
↓
Pilih Jadwal
↓
Booking Paket
↓
Status : Pending Payment
↓
Pembayaran
↓
Status : Paid
↓
Admin Menyelesaikan Perjalanan
↓
Status : Completed
↓
Loyalty Reward Optimizer
↓
Update Tier & Discount
↓
Diskon Digunakan Pada Booking Berikutnya
```

---

# Loyalty Reward System

| Tier | Minimum Distance | Discount |
|------|-----------------|-----------|
| Bronze | 0 KM | 0% |
| Silver | 1000 KM | 5% |
| Gold | 3000 KM | 10% |
| Platinum | 5000 KM | 15% |

---

# Request Life Cycle Laravel

```text
User Request
↓
Route
↓
Middleware
↓
Controller
↓
Service Layer
↓
Eloquent Model
↓
PostgreSQL Database
↓
Response (Inertia + Vue)
```

---

# Tech Stack

## Backend
- PHP 8.4
- Laravel 13
- Laravel Breeze
- Inertia.js
- Ziggy

## Frontend
- Vue 3
- Tailwind CSS
- JavaScript

## Database
- PostgreSQL (Supabase)

## Deployment
- Railway

## Development Tools
- Visual Studio Code
- Git
- GitHub
- Postman

---

# Agentic System

Travelku mengimplementasikan konsep *Rule-Based Agent* melalui service:

```text
LoyaltyRewardOptimizerService
```

Service tersebut bertugas:

1. Menghitung total jarak perjalanan pengguna.
2. Menentukan tier loyalty.
3. Menghitung diskon yang diperoleh.
4. Memperbarui data pengguna secara otomatis.

---

# Main Service Layer

```text
BookingService
PaymentService
LoyaltyRewardOptimizerService
```

---

# Database Main Entities

```text
Users
Packages
Package Schedules
Bookings
```

---

# Booking Status Flow

```text
pending_payment
↓
paid
↓
completed
```

atau

```text
pending_payment
↓
cancelled
```

---

# Folder Structure

```text
app/
 ├── Http/Controllers
 ├── Models
 ├── Services

resources/
 └── js/
     ├── Pages
     ├── Components

routes/
 └── web.php
```

---

# Technical Notes

- Menggunakan Service Layer Pattern.
- Menggunakan Middleware Authentication dan Role Authorization.
- Menggunakan Inertia SPA Architecture.
- Menggunakan Rule-Based Agent untuk optimasi loyalty.
- Sistem kuota jadwal berkurang berdasarkan jumlah peserta booking.
- Diskon loyalty diterapkan secara otomatis pada booking berikutnya.

---

# Non Technical Information

Metodologi pengembangan yang digunakan adalah pendekatan iteratif dengan pemisahan antara business logic dan presentation layer agar aplikasi mudah dikembangkan dan dipelihara. Sistem dirancang untuk meningkatkan pengalaman pengguna melalui mekanisme reward otomatis dan proses booking yang sederhana.

---
