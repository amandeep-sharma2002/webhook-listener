# Webhook Listener Assignment

This repository contains a Laravel-based webhook listener system with HMAC authentication and a simple payment status API. 

It includes test scripts to submit webhook events and fetch payment statuses.

---

## **Setup Instructions**

1. **Clone the repository:**
```bash
git clone https://github.com/amandeep-sharma2002/webhook-listener.git
cd webhook-assignment
```


2. **Install dependencies:**
```bash
composer install
```

2. **Set up environment file:**
```bash
cp .env.example .env
php artisan key:generate
```


3. **Run migrations:**
```bash
php artisan migrate
```

4. **Start Laravel server:**
```bash
php artisan serve
```

5. **Run test scripts:**

You can change payload as per your requirement
```bash
bash submit-webhook.sh
bash get-payment-status.sh

```


