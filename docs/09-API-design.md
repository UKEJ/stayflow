# StayFlow API Design

## API Style

RESTful API

Base URL

/api/v1

---

## Authentication

POST /auth/register

POST /auth/login

POST /auth/logout

POST /auth/forgot-password

POST /auth/reset-password

GET /auth/profile

---

## Businesses

GET /businesses

POST /businesses

GET /businesses/{id}

PATCH /businesses/{id}

DELETE /businesses/{id}

---

## Properties

GET /properties

POST /properties

GET /properties/{id}

PATCH /properties/{id}

DELETE /properties/{id}

---

## Units

GET /units

POST /units

PATCH /units/{id}

DELETE /units/{id}

---

## Guests

GET /guests

POST /guests

GET /guests/{id}

PATCH /guests/{id}

---

## Reservations

GET /reservations

POST /reservations

GET /reservations/{id}

PATCH /reservations/{id}

DELETE /reservations/{id}

---

## Payments

GET /payments

POST /payments

GET /payments/{id}

---

## Notifications

GET /notifications

PATCH /notifications/{id}/read