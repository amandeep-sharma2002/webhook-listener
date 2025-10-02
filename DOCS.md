# Webhook Listener API Documentation

This document outlines the implemented API endpoints, request/response formats, and usage of test scripts for the Webhook Listener assignment.

---

## **1. Submit Webhook**

**Endpoint:**  POST /api/webhook/{provider}


**Request Body Example:**
```json
{
  "event": "payment.failed",
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_015",
        "status": "failed",
        "amount": 5000,
        "currency": "INR"
      }
    }
  },
  "created_at": 1751889865,
  "id": "evt_auth_018"
}
```

**Response Codes:**

- 201 Created → webhook saved successfully

- 400 Bad Request → invalid HMAC signature

- 200 Ignore → duplicate event_id

**Notes:**

- {provider} is the name of the payment provider (e.g., razorpay, paypal).

- Duplicate events are ignored based on id.


## **2. Get Payment Status**

**Endpoint:**  GET /api/payments/{payment_id}/events

**Description:**
Pass the payment_id to this endpoint, and it will return all statuses associated with that transaction.


**Response Example:**
```json
[
  {
    "event_type": "payment_authorized",
    "received_at": "2025-07-08T12:00:00Z"
  },
  {
    "event_type": "payment_captured",
    "received_at": "2025-07-08T12:01:23Z"
  }
]
```