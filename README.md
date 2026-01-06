# StudeeFlow API
is a Student Progress and Goal Tracking System that helps schools monitor academic performance and personal development. The system supports Admin, Teacher, and Student roles, allowing administrators to manage the platform, teachers to track progress and set goals, and students to monitor their achievements and improvement over time.

---
## Requirements

- PHP >= 8.1
- Composer
- MySQL

---

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/kyBa-Le/studee-flow-be
   cd studee-flow-be
   ```
2. **Install PHP dependencies**

    ```
    composer install
    ```

3. **Install JavaScript dependencies**
    ```
    npm install
    ```

4. **Copy environment file**
    ```
    cp .env.example .env
    ```

5. **Generate application key**
    ```
    php artisan key:generate
    ```

6. **Run database migrations**
    ```
    php artisan migrate
    ```

7. **Start the development server**
    ```
    php artisan serve
    ```
