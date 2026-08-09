# Database Design — Portal UMKM & Wisata Desa Kopeng

## Overview

The application uses a MySQL (MariaDB) relational database with the following core entities.

## Entity Relationship Diagram

```
categories (1) ──── (N) umkms
categories (1) ──── (N) tourisms
```

## Tables

### users

Standard Laravel users table for admin authentication.

| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto increment |
| name | varchar(255) | Required |
| email | varchar(255) | Unique, required |
| email_verified_at | timestamp | Nullable |
| password | varchar(255) | Hashed |
| remember_token | varchar(100) | Nullable |
| created_at | timestamp | |
| updated_at | timestamp | |

### categories

| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto increment |
| name | varchar(255) | Required |
| slug | varchar(255) | Unique, required |
| type | enum('umkm','wisata') | Required |
| created_at | timestamp | |
| updated_at | timestamp | |

**Indexes**: slug (unique), type

### umkms

| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto increment |
| category_id | bigint (FK) | References categories.id |
| name | varchar(255) | Required |
| slug | varchar(255) | Unique, required |
| description | text | Nullable |
| address | varchar(255) | Nullable |
| latitude | decimal(10,7) | Required |
| longitude | decimal(10,7) | Required |
| whatsapp | varchar(20) | Nullable |
| instagram | varchar(255) | Nullable |
| opening_hours | varchar(255) | Nullable |
| image | varchar(255) | Nullable, file path |
| is_published | boolean | Default false |
| created_at | timestamp | |
| updated_at | timestamp | |

**Indexes**: slug (unique), category_id (foreign key), is_published

### tourisms

| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto increment |
| category_id | bigint (FK) | References categories.id |
| name | varchar(255) | Required |
| slug | varchar(255) | Unique, required |
| description | text | Nullable |
| address | varchar(255) | Nullable |
| latitude | decimal(10,7) | Required |
| longitude | decimal(10,7) | Required |
| phone | varchar(20) | Nullable |
| instagram | varchar(255) | Nullable |
| opening_hours | varchar(255) | Nullable |
| ticket_price | varchar(255) | Nullable |
| facilities | text | Nullable |
| image | varchar(255) | Nullable, file path |
| is_published | boolean | Default false |
| created_at | timestamp | |
| updated_at | timestamp | |

**Indexes**: slug (unique), category_id (foreign key), is_published

## Relationships

| Model | Relationship | Target |
|-------|-------------|--------|
| Category | hasMany | Umkm (where type = 'umkm') |
| Category | hasMany | Tourism (where type = 'wisata') |
| Umkm | belongsTo | Category |
| Tourism | belongsTo | Category |

## Seeders

Development seeders will create:
- 1 admin user
- 6-8 categories (mix of umkm and wisata types)
- 8-12 UMKM records
- 5-8 tourism destination records

All dummy data is clearly labeled as development/sample data.
