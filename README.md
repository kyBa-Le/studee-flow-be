# Laravel Architecture – Service & Repository Pattern

This project follows a **clean and scalable architecture** using:

- **Services** to handle business logic
- **Repositories** (interfaces + Eloquent implementation) for database operations
- **Service Providers** to bind interfaces to implementations using Laravel’s IoC container

---

## 🧱 Project Structure Overview

```
app/ 
├── Http/ 
│ └── Controllers/ → Handle requests, validate input, return responses 
│ ├── Models/ → Eloquent models 
│ ├── Services/ → Business logic layer 
│ |      └── UserService.php 
│ ├── Repositories/ 
│       ├── Interfaces/ → Contracts for repositories 
│       │         └── UserRepositoryInterface.php 
│       └── Eloquent/ → Concrete implementation using Eloquent 
│           └── UserRepository.php 
│ ├── Providers/ → Laravel service providers 
│ └── RepositoryServiceProvider.php

```
---

## 📌 1. Service

### 📁 Location:
`app/Services/UserService.php`

### ✅ Responsibilities:
- Contain **business logic**
- Use repository interfaces to interact with data
- Keep **Controllers clean and thin**

### 🧩 Example:

```
namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers(): array
    {
        return $this->userRepository->getAll();
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function updateUser($user, array $data)
    {
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser($user)
    {
        return $this->userRepository->delete($user);
    }
}
```

## 📌 2. Repository Interface
📁 Location:
app/Repositories/Interfaces/UserRepositoryInterface.php

✅ Responsibilities:
Define data operations as method contracts

Decouple data layer from business logic

🧩 Example:
```
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getAll(): array;

    public function findById(int $id);

    public function create(array $data);

    public function update($model, array $data);

    public function delete($model);
}
```
## 📌 3. Repository Implementation
📁 Location:

app/Repositories/Eloquent/UserRepository.php

✅ Responsibilities:
Handle database queries and persistence

Implement the interface using Eloquent ORM

🧩 Example:
```
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): array
    {
        return User::all()->toArray();
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($user, array $data)
    {
        return $user->update($data);
    }

    public function delete($user)
    {
        return $user->delete();
    }
}
```
## 📌 4. Repository Service Provider
📁 Location:
app/Providers/RepositoryServiceProvider.php

✅ Responsibilities:
Bind repository interfaces to concrete implementations

Register dependencies with Laravel's IoC container

🧩 Example:
```
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    public function boot(): void
    {
        // Nothing here for now
    }
}
```

## 🔗 Registering the Service Provider
In config/app.php, register your new provider:
```
'providers' => [
    // Other service providers...

    App\Providers\RepositoryServiceProvider::class,
],
```
## Why Use Repository Interfaces?

- **Loose Coupling**: Easily swap implementations (e.g., Eloquent → API).
- **Testability**: Mock interfaces in unit tests.
- **Encapsulation**: Keeps DB logic out of services/controllers.
- **Flexibility**: Switch between data sources without refactoring.


## 🔁 Typical Flow

```
[ Controller ]
      ↓
[  Service  ]
      ↓
[ Repository Interface ]
      ↓
[ Repository (Eloquent) ]
      ↓
[   Database   ]
```

## ✅ Benefits
Clean separation of concerns

Easier to maintain and test

Highly extendable (you can create cache or API-based repositories later)

No tight coupling to Eloquent
