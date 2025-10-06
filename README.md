
# SUMMIT WIR

This project is a **Laravel-based web application** designed to simplify the process of renting mountaineering equipment. It provides two main user roles — **Customer** and **Admin** — each with specific features to manage rentals efficiently.

---

## 🚀 Features

### 👤 Customer
- View and browse the **product catalog**
- **Rent** mountaineering equipment
- **Extend** the rental period
- View **rental history** and **transaction details**

### 🧭 Admin
- Manage **products**, **categories**, and **customers**
- Monitor **rental transactions** and **late fees**
- Access an intuitive **admin dashboard** built with [Stisla Admin Template](https://github.com/stisla/stisla)

---

## 🛠️ Tech Stack

- **Framework:** Laravel 12  
- **Database:** MySQL  
- **Authentication:** Default Auth with Email Verification
- **Storage:** Laravel Storage (public disk for product and ID images)

---

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/your-project.git
   cd your-project


2.  **Install dependencies**
    
    ```bash
    composer install
    npm install
    
   
    
3.  **Configure environment**
    
    ```bash
    cp .env.example .env
    php artisan key:generate
    
    ```
    
    -   Update your `.env` file with database credentials and mail configuration:
        
        ```env
        DB_DATABASE=your_database
        DB_USERNAME=your_username
        DB_PASSWORD=your_password
        
        MAIL_MAILER=smtp
        MAIL_HOST=mail.yourdomain.com
        MAIL_PORT=465
        MAIL_USERNAME=your@domain.com
        MAIL_PASSWORD=your_password
        MAIL_ENCRYPTION=ssl
        MAIL_FROM_ADDRESS=your@domain.com
        MAIL_FROM_NAME="${APP_NAME}"
        
        
4.  **Run migrations**
    
    ```bash
    php artisan migrate
    
    ```
    
5.  **Run the application**
    
    ```bash
    php artisan serve
    
    ```
    

----------

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── admin/
│   │   ├── auth/
│   │   └── ...
├── Models/
├── ...
resources/
├── views/
│   ├── admin/
│   ├── auth/
│   ├── components/
│   ├── customers/
│   ├── layouts/
│   └── ...
public/
├── assets/
│   └── stisla/
└── ...

```

----------

## 📧 Email Verification

Laravel’s default email verification system is enabled.  
Ensure your `.env` mail settings are properly configured to send verification emails.

----------

## 🧩 Additional Notes

-   The project follows **Laravel’s default structure** and conventions.
    
-   The **admin dashboard** is styled and structured using **Stisla** components.
    
-   Product and user-uploaded files are stored using **Laravel’s public disk** (`storage/app/public`).
    

----------

## 🖋️ License

This project is open-source and available under the MIT License.

