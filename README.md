# Razorpay Subscriptions Integration in Laravel

This project integrates Razorpay's **Subscriptions API** into a Laravel application, allowing users to opt for one-time payments or recurring subscription payments.

## 🚀 Features

-   One-time payments using Razorpay.
-   Subscription payments with auto-renewal.
-   Webhooks integration for payment verification.

---

## 📌 Prerequisites

Before setting up, ensure you have:

-   Laravel 8+ installed
-   PHP 7.4+
-   Composer installed
-   A Razorpay account (Test & Live API keys)

---

## 🛠️ Installation

### **1️⃣ Clone the Repository**

```bash
 git clone https://github.com/your-repo-name.git
 cd your-project-folder
```

### **2️⃣ Install Dependencies**

```bash
composer install
npm install
```

### **3️⃣ Set Up Environment Variables**

Rename `.env.example` to `.env` and update Razorpay credentials:

```env
RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret
```

### **4️⃣ Run Migrations**

```bash
php artisan migrate
```

### **5️⃣ Start the Laravel Server**

```bash
php artisan serve
```

---

## 🔹 Usage

### **Initiating a One-Time Payment**

1. Navigate to `/payment-initiate`.
2. Enter the required details.
3. Proceed to Razorpay payment.

### **Creating a Subscription**

1. Navigate to `/subscription-initiate`.
2. Choose a subscription plan.
3. Complete payment and get auto-renewed.

---

## 🔔 Webhooks

This project listens to Razorpay webhooks for payment success/failure.

-   Add your webhook URL in **Razorpay Dashboard** under `Settings > Webhooks`.
-   Example webhook endpoint: `/webhook/razorpay`.

```php
Route::post('/webhook/razorpay', [WebhookController::class, 'handle']);
```

---

## 📜 API Endpoints

| Method | Endpoint                 | Description                        |
| ------ | ------------------------ | ---------------------------------- |
| `POST` | `/payment-initiate`      | Initiates one-time payment         |
| `POST` | `/subscription-initiate` | Creates a new subscription         |
| `POST` | `/payment-complete`      | Verifies payment signature         |
| `POST` | `/webhook/razorpay`      | Handles Razorpay webhook responses |

---

## 📌 License

This project is open-source and available under the **MIT License**.

🚀 **Happy Coding!**
