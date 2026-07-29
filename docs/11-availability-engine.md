# Availability Engine

## Purpose

The Availability Engine determines whether a unit can be reserved for a requested stay.

Every reservation request must pass through this engine before it is confirmed.

The Availability Engine is the single source of truth for unit availability throughout StayFlow.

---

# Design Principles

The Availability Engine must be:

- Accurate
- Fast
- Deterministic
- Configurable
- Extensible

No module should determine availability independently.

Every module must use the Availability Engine.

---

# Definition of Availability

A unit is considered available only when every rule affecting availability evaluates to true.

Availability is never determined by a single database field.

It is calculated.

---

# Availability Inputs

The engine evaluates multiple sources of information.

These include:

- Existing Reservations
- Checked-in Guests
- Maintenance Blocks
- Housekeeping Blocks
- Out-of-Service Status
- Property Configuration
- Business Rules
- Future Availability Rules

Additional rules may be introduced without redesigning the engine.

---

# Reservation Rules

Reservations affect availability.

Statuses that reserve inventory include:

- Confirmed
- Checked In

Statuses that do not reserve inventory include:

- Cancelled
- Completed

Businesses may customize these behaviors in future versions.

---

# Maintenance Rules

A unit under maintenance may become unavailable.

Examples include:

- Plumbing
- Electrical Work
- Renovation
- Deep Cleaning

Businesses should decide whether maintenance blocks reservations.

---

# Housekeeping Rules

Properties may choose whether housekeeping prevents reservations.

Examples:

Option A

Cleaning does not affect availability.

Option B

Cleaning blocks reservations until completed.

This behavior should be configurable.

---

# Out of Service

Businesses may manually remove units from inventory.

Examples:

- Renovation
- Furniture Replacement
- Pest Control
- Safety Inspection

Out-of-service units are unavailable.

---

# Date Range Evaluation

Availability is always evaluated using a date range.

Example:

Check In

24 July

Check Out

28 July

The engine evaluates every overlapping reservation within that period.

---

# Conflict Detection

Reservations conflict whenever their occupied dates overlap.

The engine must prevent conflicting reservations.

Double bookings are never permitted unless explicitly supported by future business rules.

---

# Search Process

When searching for availability:

1. Select candidate units.
2. Remove unavailable units.
3. Apply business rules.
4. Return available units.

The Availability Engine should never expose unavailable units as available.

---

# Performance

Availability searches are expected to be frequent.

The engine should:

- Minimize database queries
- Use indexes effectively
- Avoid unnecessary calculations
- Scale with large properties

Performance is a design requirement.

---

# Future Extensions

The engine should support future capabilities without redesign.

Examples include:

- Channel Manager
- OTA Synchronization
- Smart Room Assignment
- AI Availability Prediction
- Group Reservations
- Multi-unit Reservations

---

# Single Source of Truth

Every module must rely on the Availability Engine.

Examples include:

- Reservations
- Website Booking Engine
- Mobile Applications
- Channel Manager
- Walk-in Reservations
- Front Desk Search

Availability logic must never be duplicated.

---

# Guiding Principle

Availability is not stored.

Availability is calculated.