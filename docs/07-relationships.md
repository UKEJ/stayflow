# StayFlow Relationships

This document defines how the core entities relate to each other.

---

## User ↔ Business

Relationship:

Many-to-Many

Reason:

A user may belong to multiple businesses.

A business may have multiple users.

Implemented through:

Business Membership

---

## Business → Property

Relationship:

One-to-Many

Reason:

A business can own multiple properties.

Each property belongs to one business.

---

## Business → Role

Relationship:

One-to-Many

Reason:

Roles are defined per business.

---

## Property → Unit Type

Relationship:

One-to-Many

Reason:

A property can have multiple unit types.

Example:

- Deluxe Room
- Executive Room
- Suite

---

## Unit Type → Unit

Relationship:

One-to-Many

Reason:

One room type can have many rooms.

Example:

Deluxe Room

↓

101

102

103

104

---

## Property → Unit

Relationship:

One-to-Many

Reason:

Every unit belongs to one property.

---

## Guest → Reservation

Relationship:

One-to-Many

Reason:

A guest may have multiple reservations.

---

## Unit → Reservation

Relationship:

One-to-Many

Reason:

A room may have many reservations over time.

Never overlapping.

---

## Reservation → Payment

Relationship:

One-to-Many

Reason:

A reservation may receive multiple payments.

Examples

Deposit

Balance Payment

Refund

---

## Property → Amenity

Relationship:

One-to-Many

Reason:

Amenities belong to individual properties.

---

## User → Notification

Relationship:

One-to-Many

Reason:

Users receive notifications.

---

# Ownership Rules

Business owns:

- Properties
- Roles

Property owns:

- Unit Types
- Units
- Amenities

Reservation owns:

- Payments

Guest owns:

- Reservation History

User owns:

- Notifications

---

# Data Isolation

Every business can only access its own data.

No business can access another business's:

- Properties
- Reservations
- Guests
- Payments
- Reports