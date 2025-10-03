# Generate HMAC signature using secret given in assignment
SECRET="test_secret"
SIGNATURE=$(echo -n "$PAYLOAD" | openssl dgst -sha256 -hmac "$SECRET" | sed 's/^.* //')

# Send request to your Laravel webhook endpoint
curl -X POST http://127.0.0.1:8000/api/webhook/paypal \
  -H "Content-Type: application/json" \
  -H "X-Signature: $SIGNATURE" \
  -d @mock_payloads/payment_authorized.json

# payment_authorized.json
# payment_failed.json
#payment_captured.json

