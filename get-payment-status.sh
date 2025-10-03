#!/bin/bash

paymentId=pay_014

curl -X GET "http://127.0.0.1:8000/api/payments/$paymentId/events"
