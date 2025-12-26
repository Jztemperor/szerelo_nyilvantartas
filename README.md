# Szerelő Nyilvántartás

**Szerelő Nyilvántartás** is a web-based workshop/maintenance tracking system designed to help technicians and managers keep structured records of maintenance jobs, assignments, and work progress.

> This repository contains the full source code for the application along with database migrations, routes, and a simple dashboard. :contentReference[oaicite:1]{index=1}

---

## 🧩 Project Overview

This project provides:
- A **web interface** for tracking jobs and technicians
- **User-friendly dashboards** for overview and reporting
- A structured backend with routing, models, and storage
- Ready-to-use database schema and data seeds

Built using:
- **PHP (Laravel / MVC style)** backend  
- **Blade, Tailwind and Flowbite** for views  
- **Frontend tooling (CSS/JS)** for UI components  
- Relational database for persistence :contentReference[oaicite:2]{index=2}

---

## 📦 Features

✔ Register and manage technicians  
✔ Log maintenance jobs  
✔ Track job statuses and timelines  
✔ Interactive dashboard for insights  
✔ Modular code structure for easy extension

---

## 🚀 Getting Started

### Prerequisites

Before running the project locally, ensure you have:
- PHP ≥ 8.x  
- Composer  
- A SQL database (MySQL, SQLite, etc.)  
- Node.js & npm (for frontend assets)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/Jztemperor/szerelo_nyilvantartas.git
cd szerelo_nyilvantartas
````

2. Install PHP dependencies:

```bash
composer install
```

3. Install frontend dependencies & compile assets:

```bash
npm install
npm run dev
```

4. Set up your `.env` file (copy from `.env.example`) and configure database credentials.

5. Run migrations & seeders:

```bash
php artisan migrate --seed
```

6. Serve the app locally:

```bash
php artisan serve
```

Now open your browser and visit `http://localhost:8000`.

---

## 🛠️ Folder Structure

```
📁 app/               # Application logic & models  
📁 database/          # Migrations & seeds  
📁 routes/            # App routing  
📁 resources/         # Views & frontend assets  
📁 public/            # Public entry point  
📄 dashboard.pdf      # Project dashboard documentation  
```

## 📄 License

This project is available under the **MIT License** (or project-specific license if included).

---

## 🧑‍🔧 About

Built and maintained by **Jztemperor** and **domnanob**, aiming to simplify workshop job tracking and technician records in small-to-medium size maintenance environments. ([GitHub][1])

---

👍 *Thanks for checking out `szerelo_nyilvantartas` — hope it helps you build something great!*

