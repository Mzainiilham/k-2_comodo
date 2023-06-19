## Cara menjalankan Aplikasi

Clone project

```bash
  git clone https://github.com/Mzainiilham/k-2_comodo.git
```

Pergi ke file aplikasi

```bash
  cd project-name
```

-   Copy .env.example file menjadi .env dan edit database

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan migrate:fresh --seed
```

#### Login

-   email = admin@example.com
-   password = 123
