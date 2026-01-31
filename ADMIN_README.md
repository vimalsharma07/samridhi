# Admin Panel Guide

## Access

- **URL:** `/admin/login`
- **Default credentials:**
  - Email: `admin@samridhipipes.com`
  - Password: `password`

**Important:** Change the default password after first login.

## Features

### 1. Website Settings
- **Path:** Admin → Settings
- Update: Address, Phone, Toll Free, Email
- Social links: Instagram, Twitter, YouTube, LinkedIn, Facebook
- Legal pages: Privacy Policy URL, Terms & Conditions URL

### 2. Blog Management
- **Path:** Admin → Blogs
- Create, edit, delete blog posts
- CKEditor for rich text (images, tables, formatting)
- Featured image upload
- Images are stored in `public/uploads/` (moved, not storage symlink)

### 3. Image Upload
- Blog featured images → `public/uploads/blogs/`
- CKEditor inline images → `public/uploads/ckeditor/`
- Uses PHP `move()` for direct public folder storage

## Creating an Admin User

Run the seeder to create the default admin:
```bash
php artisan db:seed --force
```

Or create manually via Tinker:
```bash
php artisan tinker
>>> App\Models\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('yourpassword'),'is_admin'=>true]);
```
