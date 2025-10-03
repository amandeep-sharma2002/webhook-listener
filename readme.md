# Webhook Listener Assignment

This repository contains a Laravel-based webhook listener system with HMAC authentication and a simple payment status API. 

It includes test scripts to submit webhook events and fetch payment statuses.

---

## **Setup Instructions**

1. **Clone the repository:**
```bash
git clone https://github.com/amandeep-sharma2002/webhook-listener.git
cd webhook-listener
```


2. **Install dependencies:**
```bash
composer install
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

You can change payload as per your requirement in the files:
- payment_authorized.json
- payment_failed.json
- payment_captured.json

```bash
bash submit-webhook.sh
bash get-payment-status.sh
```


