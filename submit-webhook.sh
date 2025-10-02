PAYLOAD='{
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
}'

# Generate HMAC signature (replace with your secret from .env)
SECRET="test_secret"
SIGNATURE=$(echo -n "$PAYLOAD" | openssl dgst -sha256 -hmac "$SECRET" | sed 's/^.* //')

# Send request to your Laravel webhook endpoint
curl -X POST http://127.0.0.1:8000/api/webhook/paypal \
  -H "Content-Type: application/json" \
  -H "X-Signature: $SIGNATURE" \
  -d "$PAYLOAD"
