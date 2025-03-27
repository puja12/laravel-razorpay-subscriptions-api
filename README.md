# Razorpay Subscriptions Integration in Laravel

This project integrates Razorpay's **Subscriptions API** into a Laravel application, allowing users to opt for one-time payments or recurring subscription payments.

## 🚀 Features

-   One-time payments using Razorpay.
-   Subscription payments with auto-renewal.

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
 git clone https://github.com/laravel-razorpay-subscriptions-api.git

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
RAZORPAY_SUBSCRIPTION_PLAN_ID=your_subscription_plan_id
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

## 📜 API Endpoints

| Method | Endpoint                 | Description                        |
| ------ | ------------------------ | ---------------------------------- |
| `POST` | `/payment-initiate`      | Initiates one-time payment         |
| `POST` | `/subscription-initiate` | Creates a new subscription         |
| `POST` | `/payment-complete`      | Verifies payment signature         |

---


🚀 **Happy Coding!**
