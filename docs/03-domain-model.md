# StayFlow Domain Model

## Core Business Concept

StayFlow is a Hospitality Operating System.

Everything inside StayFlow revolves around helping hospitality businesses operate, grow, and make better decisions.

---

# Primary Domain

Business

A Business represents a legal or operational organization.

Examples:

- ABC Hospitality Ltd.
- Hilton Nigeria Ltd.
- Prestige Apartments Ltd.

A business owns one or more properties.

---

# Property

A Property represents a physical location where guests receive services.

Examples:

- Hotel
- Resort
- Apartment
- Hostel
- Lodge
- Guest House
- Event Centre

Every property belongs to one business.

---

# User

A User is a person who interacts with the platform.

Examples

- Owner
- Manager
- Receptionist
- Accountant
- Housekeeper
- Maintenance Staff
- Guest

---

# Reservation

Represents a booking made by a guest.

Reservations belong to properties.

---

# Guest

Represents a customer.

Guests may have multiple reservations.

---

# Payment

Represents financial transactions.

Payments belong to reservations.

---

# Staff

Represents employees working for a business.

Staff are assigned roles.

---

# Assets

Represents business assets.

Examples

- Rooms
- Furniture
- Equipment
- Laundry Machines
- Vehicles

---

# Reports

Business intelligence generated from operational data.

---

# AI

Provides recommendations based on operational data.

The AI never owns data.

It consumes data.