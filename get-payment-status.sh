#!/bin/bash

paymentId=pay_015

curl -X GET "http://127.0.0.1:8000/api/payments/$paymentId/events"
