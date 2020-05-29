# Uid
This package provides Stripe-like UIDs for your Laravel models.

## Examples

```bash
>>> $book->uid;
=> "book_F9WqctEs3QYg9iT0"

>>> $user->uid;
=> "usr_F9WqctEs3QYg9iT0"
 
>>> $order->uid;
=> "ord_F9WqctEs3QYg9iT0"
```

## Installation

### 1. Add database column
#### 1.1 If creating a new model

```bash
php artisan make:model Book -m
```

Open up the migration file for the model and add a `uid` field

```bash
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 32);
            $table->timestamps();
        });
    }
```

#### 1.2 If adding to existing model

```bash
php artisan make:migration --table books add-uid-to-books
```

Open up the migration file you just created and add a `uid` field

```bash
    /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('books', function (Blueprint $table) {
                $table->string('uid', 32)->after('id');
            });
        }
    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('uid');
            });
        }
```

### 2. Add Trait and prefix to Laravel model

```bash
<?php

namespace App;

use Dpods\Uid\Traits\UID;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use UID;

    protected static $uidPrefix = 'book';
}

```

### 3. Create new models

```bash
 >>> $book1 = Book::create();
 => App\Book {#2965
      uid: "book_F9WqctEs3QYg9iT0",
      updated_at: "2020-05-29 03:59:09",
      created_at: "2020-05-29 03:59:09",
      id: 3,
    }
 
 >>> $book2 = Book::create();
 => App\Book {#2959
      uid: "book_PTgKOt1IGBIhRXj7",
      updated_at: "2020-05-29 03:59:13",
      created_at: "2020-05-29 03:59:13",
      id: 4,
    }
    
 >>> $book1->uid;
 => "book_F9WqctEs3QYg9iT0"
 
 >>> $book2->uid;
 => "book_PTgKOt1IGBIhRXj7"   
```
