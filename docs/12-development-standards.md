# StayFlow Development Standards

## General Principles

- Write readable code.
- Avoid duplication.
- Keep functions small and focused.
- Prefer composition over duplication.
- Follow SOLID principles where appropriate.

---

## Git Workflow

- One feature per branch.
- Pull Request required before merging.
- No direct commits to main after the initial setup.

---

## Commit Convention

feat:

New feature

fix:

Bug fix

docs:

Documentation

refactor:

Code restructuring

style:

Formatting

test:

Testing

chore:

Maintenance

---

## Backend

Framework:

Laravel

Language:

PHP

Style Guide:

PSR-12

---

## Frontend

Framework:

Next.js

Language:

TypeScript

Styling:

Tailwind CSS

---

## Database

Database:

PostgreSQL

Naming:

snake_case

Plural table names

---

## API

RESTful

JSON responses

Consistent error format

Versioned endpoints

/api/v1

---

## Security

- Password hashing
- Input validation
- Authorization checks
- CSRF protection where applicable
- Rate limiting

---

## Testing

Backend:

PHPUnit / Pest

Frontend:

Playwright (future)

---

## Documentation

Every major feature must be documented before implementation.