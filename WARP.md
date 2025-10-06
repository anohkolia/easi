# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Architecture

EASI is a full-stack web application with a clear separation between frontend and backend:

### Frontend (Vue.js + TypeScript)
- **Location**: `/frontend/` directory
- **Stack**: Vue 3 + TypeScript + Vite + TailwindCSS
- **Architecture**: Component-based with Vue Router for routing and Pinia for state management
- **Key directories**:
  - `src/views/` - Page components (HomePage, EartisanPage, NotFound)
  - `src/components/` - Reusable UI components organized by feature (home/, eartisan/)
  - `src/api/` - HTTP client configuration using Axios
  - `src/router/` - Vue Router configuration
  - `src/stores/` - Pinia stores for state management
  - `src/composables/` - Vue composition functions

### Backend (Laravel + PHP)
- **Location**: `/backend/` directory  
- **Stack**: Laravel 12 + PHP 8.2+
- **Architecture**: Standard Laravel MVC structure
- **Key directories**:
  - `app/` - Application code (Models, Controllers, Providers)
  - `routes/` - Route definitions (web.php, api.php)
  - `database/` - Migrations, seeders, and factories
  - `resources/` - Views and assets

### Communication
- Frontend communicates with backend via REST API
- API endpoint configuration: `VITE_API_URL` (defaults to `http://localhost:8000/api`)
- CORS enabled for cross-origin requests

## Development Commands

### Frontend Development
```bash
cd frontend

# Install dependencies
npm install

# Development server with hot reload
npm run dev

# Build for production
npm run build

# Type checking
npm run type-check

# Linting and formatting
npm run lint
npm run format

# Testing
npx vitest                    # Run tests in watch mode
npx vitest run               # Run tests once
npx vitest --ui              # Run tests with UI
npx vitest --coverage        # Run tests with coverage
```

### Backend Development
```bash
cd backend

# Install PHP dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database setup
touch database/database.sqlite  # For SQLite
php artisan migrate

# Development server
php artisan serve               # Runs on http://localhost:8000

# Full development stack (Laravel + Queue + Logs + Vite)
composer run dev

# Testing
composer run test              # Run PHPUnit tests
php artisan test

# Code formatting (Laravel Pint)
./vendor/bin/pint
```

### Full Stack Development
```bash
# From backend directory - runs all services concurrently
composer run dev
# This starts: Laravel server, queue worker, logs (pail), and Vite

# Alternative: Run separately
# Terminal 1:
cd backend && php artisan serve

# Terminal 2: 
cd frontend && npm run dev
```

## Testing Strategy

### Frontend Testing
- **Framework**: Vitest + Vue Test Utils
- **Environment**: jsdom for DOM simulation
- **Location**: Tests alongside components in `__tests__/` directories
- **Configuration**: `vitest.config.ts` and `src/test-setup.ts`
- **Run single test**: `npx vitest src/path/to/test.spec.ts`

### Backend Testing
- **Framework**: PHPUnit (built into Laravel)
- **Location**: `tests/` directory
- **Types**: Feature tests and Unit tests
- **Run single test**: `php artisan test --filter TestName`

## Key Architecture Patterns

### Frontend Component Organization
- Feature-based component organization (`home/`, `eartisan/`)
- Composition API with `<script setup>` syntax
- TypeScript interfaces for type safety
- Centralized API client in `src/api/http.ts`

### Backend API Structure
- RESTful API routes in `routes/api.php`
- JSON responses for all API endpoints
- Laravel's built-in validation and error handling
- Example: `/api/ping` endpoint returns `{'message': 'pong depuis Laravel'}`

### Styling and UI
- TailwindCSS for utility-first styling
- Custom Poppins font family
- Responsive design patterns
- Component-scoped styles when needed

### Environment Configuration
- Frontend: Environment variables prefixed with `VITE_`
- Backend: Laravel .env configuration
- API URL configured via `VITE_API_URL` environment variable

## Development Workflow

1. **Starting Development**: Use `composer run dev` from backend directory for full stack
2. **Frontend-only Development**: `cd frontend && npm run dev`
3. **Backend-only Development**: `cd backend && php artisan serve`
4. **Database Changes**: Create migrations with `php artisan make:migration`
5. **New API Endpoints**: Add to `backend/routes/api.php`
6. **New Frontend Routes**: Add to `frontend/src/router/index.ts`

## Node.js and PHP Requirements

- **Node.js**: ^20.19.0 || >=22.12.0
- **PHP**: ^8.2
- **Laravel**: ^12.0