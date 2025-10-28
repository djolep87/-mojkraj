# Community Features Implementation

## Overview

This document describes the implementation of community features for the "Moj kraj" Laravel application. The system uses the existing `Building` model as the foundation for community management.

## Features Implemented

### 1. Automatic Community Membership on Registration ✅

-   **Location**: `RegisterController@handleBuildingMembership()`
-   **Functionality**:
    -   Automatski procesira pripadnost zgradi tokom registracije
    -   Koristi adresu, grad i naselje korisnika
    -   Ako zgrada već postoji → pridruži korisnika kao "resident"
    -   Ako zgrada ne postoji → kreira novu zgradu i postavi korisnika kao "manager"
    -   Vraća detaljne informacije o tome šta je urađeno

#### Auto-Join Process

```php
During Registration:
1. User provides: address, neighborhood, city
2. System searches for existing building at that address
3. If exists:
   - Add user as 'resident' to existing building
4. If not exists:
   - Create new building with auto-generated name
   - Add user as 'manager' (creator of the building)
```

#### Return Information

The method returns array with:

-   `joined`: boolean - da li je korisnik pridružen postojećoj zgradi
-   `created`: boolean - da li je kreirana nova zgrada
-   `building`: string - naziv zgrade
-   `role`: string - uloga korisnika ('manager' ili 'resident')
-   `message`: string - korisnička poruka

### 2. Announcement Comments System ✅

-   **Model**: `AnnouncementComment`
-   **Migration**: `create_announcement_comments_table`
-   **Controller**: `AnnouncementCommentController`
-   **Routes**: Full CRUD routes for comments

#### Database Structure

```php
announcement_comments {
    id
    announcement_id (foreign key)
    user_id (foreign key)
    content (text)
    created_at
    updated_at
}
```

#### Functionality

-   Members can comment on announcements
-   Comments show user name and creation time
-   Users can edit their own comments
-   Managers can delete any comment
-   Comments are loaded with user information for display

### 2. Updated Announcement System ✅

-   Added `user_id` to announcements table
-   Updated `Announcement` model with:
    -   `user()` relationship
    -   `comments()` relationship
-   Announcements now track the author
-   Comments are eager-loaded with announcements

### 3. Manual Join Building Functionality ✅

-   **Method**: `BuildingController::join()`
-   **Route**: `POST /stambene-zajednice/join`
-   **Functionality**:
    -   Users can join existing buildings by providing address
    -   System searches for building by address, city, and neighborhood
    -   Users are added as "resident" role by default
    -   Prevents duplicate memberships
    -   Returns appropriate error messages if building doesn't exist

### 4. Enhanced Controllers ✅

#### BuildingController

-   ✅ `join()` method for joining buildings
-   ✅ Proper authorization checks
-   ✅ JSON and web response handling
-   ✅ Error handling with try-catch

#### AnnouncementController

-   ✅ Saves `user_id` when creating announcements
-   ✅ Loads user and comments relationships
-   ✅ Eager loading for performance

#### AnnouncementCommentController

-   ✅ `index()` - List comments for an announcement
-   ✅ `store()` - Create new comment (requires building membership)
-   ✅ `update()` - Update comment (author or manager only)
-   ✅ `destroy()` - Delete comment (author or manager only)

## Database Changes

### New Tables

-   `announcement_comments` - Stores comments on announcements

### Modified Tables

-   `announcements` - Added `user_id` foreign key column

## Routes

### Building Routes

```php
POST /stambene-zajednice/join  -> buildings.join
```

### Comment Routes

```php
GET    /stambene-zajednice/{building}/objave/{announcement}/komentari
POST   /stambene-zajednice/{building}/objave/{announcement}/komentari
PUT    /stambene-zajednice/{building}/objave/{announcement}/komentari/{comment}
DELETE /stambene-zajednice/{building}/objave/{announcement}/komentari/{comment}
```

## Authorization

### Announcement Comments

-   **View**: Any building member
-   **Create**: Any building member
-   **Update**: Comment author OR building manager
-   **Delete**: Comment author OR building manager

### Joining Buildings

-   Any authenticated user can join
-   Must not already be a member
-   Building must exist

## Usage Examples

### Joining a Building

```bash
POST /stambene-zajednice/join
{
    "address": "Street 123",
    "city": "Belgrade",
    "neighborhood": "Centar"
}
```

### Creating a Comment

```bash
POST /stambene-zajednice/{building}/objave/{announcement}/komentari
{
    "content": "This is a great announcement!"
}
```

### Response Format

All endpoints return JSON with standard format:

```json
{
    "success": true/false,
    "message": "Operation message",
    "data": {...}
}
```

## Current Status

✅ **Completed:**

-   Database migrations
-   Models and relationships
-   Controllers with full CRUD
-   Routes configuration
-   Authorization logic
-   Error handling

⏳ **Pending:**

-   Views for displaying announcements with comments (frontend)
-   AnnouncementPolicy updates for fine-grained authorization
-   AI helper placeholder (bonus feature)

## Models Relationship Diagram

```
Building (Community)
├── users (many-to-many via building_user)
│   ├── managers (where role_in_building = 'manager')
│   └── residents (where role_in_building = 'resident')
├── announcements (has-many)
│   ├── user (belongs-to)
│   └── comments (has-many)
│       └── user (belongs-to)
├── votes (has-many)
│   ├── options (has-many)
│   └── results (has-many-through)
└── expenses (has-many)
```

## API Endpoints Summary

| Method | Endpoint                                                                 | Controller Method | Purpose        |
| ------ | ------------------------------------------------------------------------ | ----------------- | -------------- |
| GET    | /stambene-zajednice/{building}/objave/{announcement}/komentari           | index()           | List comments  |
| POST   | /stambene-zajednice/{building}/objave/{announcement}/komentari           | store()           | Add comment    |
| PUT    | /stambene-zajednice/{building}/objave/{announcement}/komentari/{comment} | update()          | Edit comment   |
| DELETE | /stambene-zajednice/{building}/objave/{announcement}/komentari/{comment} | destroy()         | Delete comment |
| POST   | /stambene-zajednice/join                                                 | join()            | Join building  |

## Next Steps

1. Create Blade views for announcements with comments display
2. Add JavaScript for dynamic comment submission
3. Update AnnouncementPolicy for granular permissions
4. Add email invitation functionality for managers
5. Implement AI helper placeholder methods

## Notes

-   The system uses "Building" terminology but functions as a "Community" system
-   All timestamps are automatic (created_at, updated_at)
-   Foreign keys use `onDelete('cascade')` for data integrity
-   JSON responses work for API integration
-   Web responses include redirects with flash messages
