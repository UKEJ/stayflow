# StayFlow Database Schema

## Core Tables

### Authentication

- users
- business_memberships
- roles

---

### Businesses

- businesses
- properties

---

### Property

- unit_types
- units
- amenities

---

### Guests

- guests

---

### Reservations

- reservations

---

### Payments

- payments

---

### Notifications

- notifications

---

# Naming Convention

All table names are plural.

Examples:

users

businesses

properties

reservations

payments

---

# Primary Keys

Every table uses:

id (UUID)

---

# Foreign Keys

Examples

business_id

property_id

reservation_id

guest_id

user_id

role_id

---

# Timestamps

Every table contains:

created_at

updated_at

---

# Soft Deletes

The following tables support soft deletes:

- businesses
- properties
- units
- unit_types
- guests
- reservations

---

# Audit Trail

Future implementation.

Every critical action will be recorded for security purposes.