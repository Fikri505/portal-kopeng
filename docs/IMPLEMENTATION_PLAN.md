# Implementation Plan — Portal UMKM & Wisata Desa Kopeng

## Environment

| Component | Version |
|-----------|---------|
| PHP | 8.2.12 |
| Composer | 2.9.5 |
| Node.js | v24.15.0 |
| npm | 11.12.1 |
| MySQL | MariaDB 10.4.32 |
| Server | XAMPP |

## Phases

### Phase 0 — Environment Inspection ✅
- [x] Inspect workspace (empty directory)
- [x] Verify PHP 8.2.12
- [x] Verify Composer 2.9.5
- [x] Verify Node v24.15.0, npm 11.12.1
- [x] Verify MariaDB 10.4.32 via XAMPP

### Phase 1 — Documentation ✅
- [x] Create docs/PROJECT_SPEC.md
- [x] Create docs/DATABASE.md
- [x] Create docs/IMPLEMENTATION_PLAN.md

### Phase 2 — Laravel Project Setup
- [ ] Create Laravel project
- [ ] Configure .env for XAMPP MySQL
- [ ] Install Tailwind CSS
- [ ] Install Filament
- [ ] Install Leaflet.js
- [ ] Verify application starts

### Phase 3 — Database
- [ ] Create migrations (categories, umkms, tourisms)
- [ ] Create models with relationships
- [ ] Create factories
- [ ] Create seeders
- [ ] Run migrations and seeders

### Phase 4 — Admin Panel (Filament)
- [ ] Configure Filament
- [ ] Create admin user
- [ ] Create CategoryResource
- [ ] Create UmkmResource
- [ ] Create TourismResource
- [ ] Verify CRUD operations

### Phase 5 — Public Layout & Homepage
- [ ] Create base layout (app.blade.php)
- [ ] Create responsive navbar
- [ ] Create footer
- [ ] Build homepage (hero, featured, map preview, CTA)
- [ ] Verify responsive behavior

### Phase 6 — UMKM Pages
- [ ] Create UmkmController
- [ ] Build UMKM listing page
- [ ] Build UMKM detail page
- [ ] Add search and category filter
- [ ] Add WhatsApp contact button
- [ ] Add Google Maps navigation

### Phase 7 — Tourism Pages
- [ ] Create TourismController
- [ ] Build tourism listing page
- [ ] Build tourism detail page
- [ ] Add search and category filter
- [ ] Add Google Maps navigation

### Phase 8 — Search & Filtering
- [ ] Server-side search for UMKM
- [ ] Server-side search for tourism
- [ ] Category filter for UMKM
- [ ] Category filter for tourism
- [ ] Preserve query parameters
- [ ] Add pagination

### Phase 9 — Interactive Map
- [ ] Create MapController
- [ ] Build map page with Leaflet.js
- [ ] Load markers from database (JSON endpoint)
- [ ] Distinguish UMKM vs tourism markers
- [ ] Create marker popups with detail links
- [ ] Add Google Maps navigation in popups
- [ ] Auto-fit map bounds
- [ ] Verify mobile usability

### Phase 10 — Responsive UI Polish
- [ ] Verify all pages at 320px, 768px, 1024px+
- [ ] Fix any overflow issues
- [ ] Polish typography, spacing, cards
- [ ] Verify navbar mobile menu
- [ ] Verify map on mobile

### Phase 11 — Testing & Bug Fixing
- [ ] Verify all public pages load
- [ ] Verify search/filter functionality
- [ ] Verify admin CRUD operations
- [ ] Check for JavaScript console errors
- [ ] Check Laravel logs for errors
- [ ] Verify unpublished records are hidden
- [ ] Test slug-based URLs

### Phase 12 — Documentation & Deployment Prep
- [ ] Update README.md
- [ ] Update IMPLEMENTATION_PLAN.md with final status
- [ ] Verify installation instructions
- [ ] Final review

## Progress Log

| Date | Phase | Status |
|------|-------|--------|
| 2026-08-09 | Phase 0 | ✅ Complete |
| 2026-08-09 | Phase 1 | ✅ Complete |
