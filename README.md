# Laravel 12 ✧ FullStack CRUD with Livewire 3.6 + Flux UI 2.0 + Tailwind 4.0 + Volt 1.6 ✧

A modern **CRUD** (Create, Read, Update, Delete) application built using **Laravel 12**, **Livewire 3.6**, **Flux UI 2.0**, **Tailwind CSS 4.0**, and **Volt 1.6**. This project includes enhanced **grid view** functionality with **sorting** and **searching** features.

## 🔥 Features  
✅ **CRUD Operations** (Create, Read, Update, Delete)  
✅ **Livewire-powered** real-time interactions  
✅ **Sorting & Searching** on grid view  
✅ **Modern UI with Livewire, Flux UI & Volt**  
✅ **Tailwind CSS 4.0 for styling**  
✅ **PHP 8.4+ compatibility**  

---

## 📂 Tech Stack  

| Technology   | Version |
|-------------|---------|
| **Laravel**  | 12.0.x  |
| **Livewire** | 3.6.x   |
| **Flux UI**  | 2.0.x   |
| **Tailwind** | 4.0.x   |
| **Volt**     | 1.6.x   |
| **PHP**      | ^8.4    |

---

## 🚀 Installation Guide  

### 1️⃣ Clone the Repository  
```sh
git clone https://github.com/ux4web/laravel-stack-crud-kit.git
cd app
```

### 2️⃣ Install Dependencies  
```sh
composer install
npm install
```

### 3️⃣ Set Up Environment  
```sh
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Configure Database  
Edit the `.env` file and update the database settings:  
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```
Then, run migrations and seeders  
```sh
php artisan migrate
php artisan db:seed
```

### 5️⃣ Serve the Application  
```sh
php artisan serve
OR
composer run dev
```
Visit `http://127.0.0.1:8000` in your browser.

---

## ⚡ CRUD Functionality  

| Action  | Description |
|---------|------------|
| **Create** | Add new records using a Livewire-powered form. |
| **Read**   | View records in a responsive table with sorting & searching. |
| **Update** | Modify existing records with real-time UI feedback. |
| **Delete** | Soft delete or permanently remove records. |

---

## 📌 Sorting & Searching  

🔹 **Sorting**: Click on column headers to sort data in ascending or descending order.  
🔹 **Searching**: Use the search bar to filter results dynamically.  
🔹 **Dynamic Sort / Search Filter Badges**: Dynamic additions of tags for search and sort and intelligence recognition of Clear All badge in sort and search filters is added when more than one badge is visible on the screen.

Powered by **Livewire 3.6**, ensuring a smooth, real-time user experience!

---

## 🎨 UI & Styling  

This project leverages:  
- **Flux UI 2.0** for beautiful, ready-to-use UI components.  
- **Volt 1.6** for a clean and modern admin panel.  
- **Tailwind CSS 4.0** for fast and flexible styling.  

---

## 🛠 Commands Reference  

| Command | Description |
|---------|------------|
| `php artisan migrate:fresh --seed` | Reset and seed the database. |
| `php artisan make:livewire ComponentName` | Create a new Livewire component. |

---

## 📜 License  

This project is licensed under the **MIT License**.

---

## 🤝 Contribution  

Feel free to fork this repository and submit pull requests. Contributions are always welcome!  

---

## 📬 Contact  

👤 **Chaman Sharma | ux4web**  
🔗 [Portfolio](https://ux4web.com)  

Happy coding! 🚀 🎉  

---

Would you like me to customize or add any new feature to this in further? Feel free to add and I will try to add a provision for the same. 😊