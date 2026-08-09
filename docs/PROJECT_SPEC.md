# Portal UMKM & Wisata Desa Kopeng — Project Specification

## Overview

Portal UMKM & Wisata Desa Kopeng is a digital information portal for local small businesses (UMKM) and tourism destinations in Desa Kopeng. The website helps visitors discover UMKM and tourism destinations, view details, see locations on an interactive map, contact owners, and navigate using Google Maps.

An admin panel allows village administrators to manage all data without editing source code.

## Technology Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 11 |
| Frontend | Laravel Blade |
| Styling | Tailwind CSS |
| Database | MySQL (MariaDB 10.4) |
| Admin Panel | Filament |
| Interactive Map | Leaflet.js + OpenStreetMap |
| Navigation | Google Maps URL |
| JavaScript | Vanilla JS |

## Target Users

### Public Visitor
- Browse UMKM and tourism destinations
- Search and filter by category
- View details with images, descriptions, contact info
- View locations on interactive map
- Navigate via Google Maps
- Contact UMKM via WhatsApp

### Admin
- Secure login to Filament admin panel
- Full CRUD for UMKM, tourism destinations, and categories
- Image upload, coordinate management
- Publish/unpublish records

## MVP Features

### Public Website
1. Homepage with hero, featured items, map preview
2. UMKM listing with search and category filter
3. UMKM detail page
4. Tourism listing with search and category filter
5. Tourism detail page
6. Interactive Leaflet map with all published locations
7. Google Maps navigation from markers/detail pages
8. WhatsApp contact button
9. Responsive mobile/tablet/desktop layout

### Admin Panel
1. Secure authentication
2. UMKM CRUD with image upload
3. Tourism CRUD with image upload
4. Category CRUD
5. Coordinate management (lat/lng)
6. Publish/unpublish toggle

## Routes

| Route | Description |
|-------|------------|
| `/` | Homepage |
| `/umkm` | UMKM listing |
| `/umkm/{slug}` | UMKM detail |
| `/wisata` | Tourism listing |
| `/wisata/{slug}` | Tourism detail |
| `/peta` | Interactive map |
| `/admin` | Filament admin panel |

## Out of Scope

- Visitor registration/login
- Marketplace, cart, checkout, payment
- Booking system
- Chat, ratings, reviews, comments
- AI recommendations
- Loyalty system, advanced analytics
- Multilingual support
