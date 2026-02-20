# 🛒 Multi-Vendor Marketplace Database Conception (Laravel 12)

## 📌 Project Context

This database design targets a **multi-vendor marketplace** built with Laravel 12 for educational purposes.

The platform allows:

* Multiple vendors to create stores
* Vendors to manage their products
* Customers to buy from multiple vendors in one checkout
* Order splitting per vendor
* Commission calculation
* Theme customization per store

---

# 👤 Actors

### 👑 Admin

* Manages platform
* Approves stores
* Manages themes
* Configures commissions

### 🏪 Vendor

* Owns a store
* Selects and customizes a theme
* Adds products
* Manages vendor orders

### 🛍 Customer

* Browses stores
* Purchases products

---

# 👤 Users

## users

| Column     | Description             |
| ---------- | ----------------------- |
| id         | Primary key             |
| name       | Full name               |
| email      | Unique email            |
| password   | Hashed password         |
| role       | admin, vendor, customer |
| created_at | Creation date           |

---

# 🏪 Stores

## stores

| Column      | Description                  |
| ----------- | ---------------------------- |
| id          | Primary key                  |
| user_id     | Vendor owner                 |
| name        | Store name                   |
| slug        | SEO slug                     |
| logo        | Store logo                   |
| description | Store description            |
| status      | pending, approved, suspended |
| created_at  | Creation date                |

---

# 🎨 Themes System

## themes (platform library)

| Column     | Description        |
| ---------- | ------------------ |
| id         | Primary key        |
| name       | Theme name         |
| slug       | Theme identifier   |
| preview    | Preview image      |
| author     | Theme creator      |
| version    | Theme version      |
| is_active  | Enabled / disabled |
| created_at | Creation date      |

---

## store_themes (store customization)

| Column     | Description                                   |
| ---------- | --------------------------------------------- |
| id         | Primary key                                   |
| store_id   | Store reference                               |
| theme_id   | Selected theme                                |
| settings   | JSON customization (colors, layout, banners…) |
| is_active  | Active theme                                  |
| created_at | Creation date                                 |

---

# 📦 Products

## products

| Column      | Description         |
| ----------- | ------------------- |
| id          | Primary key         |
| store_id    | Vendor store        |
| title       | Product title       |
| slug        | SEO slug            |
| description | Product description |
| price       | Base price          |
| sale_price  | Discount price      |
| sku         | SKU                 |
| stock       | Inventory           |
| status      | active / inactive   |
| created_at  | Creation date       |

---

## product_images

| Column     | Description       |
| ---------- | ----------------- |
| id         | Primary key       |
| product_id | Product reference |
| image      | Image path        |

---

# 🗂 Categories

## categories

| Column    | Description     |
| --------- | --------------- |
| id        | Primary key     |
| name      | Category name   |
| slug      | SEO slug        |
| parent_id | Nested category |

---

## category_product

| Column      | Description        |
| ----------- | ------------------ |
| id          | Primary key        |
| product_id  | Product reference  |
| category_id | Category reference |

---

# 🛒 Cart

## carts

| Column  | Description        |
| ------- | ------------------ |
| id      | Primary key        |
| user_id | Customer           |
| status  | active / completed |

---

## cart_items

| Column     | Description    |
| ---------- | -------------- |
| id         | Primary key    |
| cart_id    | Cart           |
| product_id | Product        |
| store_id   | Vendor store   |
| qty        | Quantity       |
| price      | Snapshot price |

---

# 📦 Orders

## orders

| Column           | Description        |
| ---------------- | ------------------ |
| id               | Primary key        |
| user_id          | Customer           |
| total            | Total amount       |
| status           | pending, delivered |
| payment_status   | unpaid, paid       |
| shipping_address | Shipping data      |
| created_at       | Order date         |

---

## vendor_orders

| Column         | Description         |
| -------------- | ------------------- |
| id             | Primary key         |
| order_id       | Global order        |
| store_id       | Vendor store        |
| subtotal       | Vendor subtotal     |
| commission     | Platform commission |
| vendor_earning | Vendor earning      |
| status         | Vendor order status |

---

## order_items

| Column          | Description    |
| --------------- | -------------- |
| id              | Primary key    |
| vendor_order_id | Vendor order   |
| product_id      | Product        |
| qty             | Quantity       |
| price           | Snapshot price |

---

# 💳 Payments

## payments

| Column         | Description              |
| -------------- | ------------------------ |
| id             | Primary key              |
| order_id       | Order                    |
| amount         | Paid amount              |
| provider       | Payment gateway          |
| transaction_id | Payment reference        |
| status         | success, failed, pending |

---

# 💰 Commissions

## commissions

| Column   | Description   |
| -------- | ------------- |
| id       | Primary key   |
| store_id | Store         |
| order_id | Order         |
| amount   | Commission    |
| status   | pending, paid |

---

# 🔗 Relationships Summary

* User → hasOne Store
* Store → hasMany Products
* Store → hasMany VendorOrders
* Store → hasOne Active Theme
* Theme → used by many Stores
* Order → hasMany VendorOrders
* VendorOrder → hasMany OrderItems

---

# 🚀 Future Improvements

* Vendor payouts
* Store analytics
* Page builder
* Product variants
* Store ratings
* Vendor subscriptions

---

---

# 🎯 Theme Feature Strategy (Before Development)

This is the **recommended strategy** to build themes cleanly.

---

## ✅ Step 1 — Theme folder structure

Each theme should be a folder:

```
resources/themes/{theme_slug}/
   layouts/
   pages/
   components/
   assets/
   config.json
```

👉 `config.json` defines customizable fields.

---

## ✅ Step 2 — Theme configuration model

The `settings` JSON in `store_themes` will store:

* colors
* fonts
* banners
* homepage layout
* toggles

This avoids database complexity.

---

## ✅ Step 3 — Dynamic theme resolver

At runtime:

1. Detect store
2. Load active theme
3. Load theme settings
4. Render views dynamically

This teaches dynamic view rendering.

---

## ✅ Step 4 — Theme customization UI

Vendor dashboard should allow:

* selecting theme
* editing colors
* uploading banners
* toggling sections

All saved inside JSON settings.

---

## ✅ Step 5 — Theme fallback system

If store has no theme → load default theme.

This prevents UI breaking.

---

## ⭐ Senior Tip

Themes must control **presentation only**, not business logic.

Products, orders, and checkout must remain platform-controlled.

---

## 🚀 Teaching Order Recommendation

1. Create themes table
2. Build theme folder system
3. Implement dynamic theme loader
4. Build vendor theme selector
5. Add customization UI
6. Add homepage sections

This keeps students excited and avoids overwhelm.
